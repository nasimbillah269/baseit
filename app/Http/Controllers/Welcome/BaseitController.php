<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BaseitController extends Controller
{
    /**
     * Static BASE IT pages defined in config/baseit.php
     */
    public function page($slug)
    {
        $page = config('baseit.pages.' . $slug);
        if (!$page) {
            abort(404);
        }

        $parent = null;
        if (!empty($page['parent'])) {
            $parent = [
                'slug'  => $page['parent'],
                'title' => config('baseit.pages.' . $page['parent'] . '.title'),
            ];
        }

        return view('welcome.baseit.page', compact('page', 'slug', 'parent'));
    }

    /**
     * Old WordPress URLs -> new page
     */
    public function redirect($from)
    {
        return redirect(bpage(config('baseit.redirects.' . $from)), 301);
    }

    /**
     * Simple domain availability check using DNS records.
     * A domain with NS / A / MX records is registered.
     */
    public function domainCheck(Request $r)
    {
        $domain = strtolower(trim((string) $r->domain));
        $domain = preg_replace('#^https?://#', '', $domain);
        $domain = preg_replace('#^www\.#', '', $domain);
        $domain = explode('/', $domain)[0];

        if (!str_contains($domain, '.')) {
            $domain .= '.com';
        }

        if (!preg_match('/^(?!-)[a-z0-9-]{1,63}(?<!-)(\.[a-z0-9-]{2,63})+$/', $domain)) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid domain name (example: yourname.com).',
            ]);
        }

        $taken = @checkdnsrr($domain . '.', 'NS')
            || @checkdnsrr($domain . '.', 'A')
            || @checkdnsrr($domain . '.', 'MX');

        return response()->json([
            'success'   => true,
            'domain'    => $domain,
            'available' => !$taken,
            'message'   => $taken
                ? 'Sorry! ' . $domain . ' is already registered.'
                : 'Congratulations! ' . $domain . ' is available. Contact us to register it.',
        ]);
    }

    /**
     * Career page: job application with CV upload
     */
    public function careerApply(Request $r)
    {
        $positions = collect(config('baseit.jobs'))->pluck('title')->all();

        $r->validate([
            'name'     => 'required|max:100',
            'email'    => 'required|email|max:100',
            'position' => ['required', Rule::in($positions)],
            'message'  => 'required|max:2000',
            'cv'       => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $file = $r->file('cv');
        $name = time() . '-' . Str::slug($r->name) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('cv', $name);  // storage/app/cv (not public)

        if (general()->mail_status && general()->mail_from_address) {
            $datas = ['r' => [
                'name'    => $r->name,
                'email'   => $r->email,
                'subject' => 'Job Application: ' . $r->position,
                'position'=> $r->position,
                'cv_name' => $file->getClientOriginalName(),
                'message' => $r->message,
            ]];
            sendMail(
                general()->admin_mails ?: general()->mail_from_address,
                general()->mail_from_name,
                'Job Application: ' . $r->position,
                $datas,
                'mails.ContactMail',
                [[
                    'path' => storage_path('app/' . $path),
                    'name' => $file->getClientOriginalName(),
                    'mime' => $file->getClientMimeType(),
                ]],
                [$r->email, $r->name]   // Reply goes to the applicant
            );
        }

        Session()->flash('success', 'Your application has been submitted successfully. We will contact you soon');
        return back();
    }
}
