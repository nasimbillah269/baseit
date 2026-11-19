{{-- Admin notification for: Contact form, Order Now requests, Job applications. Inline styles = works in Gmail/Outlook/mobile. --}}
@php($r = $datas['r'])
@php($c = config('baseit.company'))
@php($isOrder = !empty($r['order']))
@php($isJob = !empty($r['position']))
@php($isChat = ($r['source'] ?? null) === 'chat')
@php($kind = $isOrder ? 'New Order Request' : ($isJob ? 'New Job Application' : ($isChat ? 'New Chat Message' : 'New Contact Message')))
@php($accent = $isOrder ? '#ff5a0e' : ($isJob ? '#2e8fd9' : ($isChat ? '#f0862f' : '#4c4c4c')))
@php($replySubject = 'Re: '.($r['subject'] ?? $kind))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{$kind}} - {{general()->title}}</title>
    <style>
        @media only screen and (max-width: 620px) {
            .wrap { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .row-label, .row-value { display: block !important; width: 100% !important; }
            .row-label { padding-bottom: 0 !important; border-bottom: 0 !important; font-size: 13px !important; }
            .h1 { font-size: 21px !important; }
            .btn { display: block !important; text-align: center !important; }
        }
    </style>
</head>
<body style="margin:0; padding:0; background:#eef0f3; -webkit-text-size-adjust:100%;">
    {{-- inbox preview text --}}
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">{{$kind}} from {{$r['name']}}{{$isOrder ? ' - '.$r['order'].(!empty($r['package']) ? ' ('.$r['package'].')' : '') : ''}}</div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#eef0f3;">
        <tr>
            <td align="center" style="padding:24px 10px;">
                <table role="presentation" class="wrap" width="600" cellpadding="0" cellspacing="0" border="0" style="width:600px; max-width:600px; background:#ffffff; border-radius:10px; overflow:hidden; font-family:Arial, Helvetica, sans-serif; color:#444;">

                    {{-- Logo --}}
                    <tr>
                        <td align="center" style="padding:22px 20px 18px; border-bottom:1px solid #eee;">
                            <img src="{{asset(general()->logo())}}" alt="{{general()->title}}" width="170" style="display:block; width:170px; max-width:60%; height:auto; border:0;">
                        </td>
                    </tr>

                    {{-- Heading band --}}
                    <tr>
                        <td class="pad" style="background:{{$accent}}; padding:20px 30px;">
                            <div style="font-size:12px; letter-spacing:1.5px; text-transform:uppercase; color:rgba(255,255,255,.85);">{{general()->title}} website</div>
                            <div class="h1" style="font-size:24px; font-weight:bold; color:#ffffff; margin-top:4px;">{{$kind}}</div>
                            <div style="font-size:13px; color:rgba(255,255,255,.9); margin-top:6px;">{{now()->format('d M Y, h:i A')}}</div>
                        </td>
                    </tr>

                    {{-- Order details --}}
                    @if($isOrder)
                    <tr>
                        <td class="pad" style="padding:24px 30px 0;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#fff6f1; border:1px solid #ffd9c7; border-left:5px solid #ff5a0e; border-radius:8px;">
                                <tr><td style="padding:14px 18px 4px; font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase; color:#ff5a0e;">&#128722; Order details</td></tr>
                                <tr><td style="padding:4px 18px 2px; font-size:13px; color:#888;">Service</td></tr>
                                <tr><td style="padding:0 18px 8px; font-size:17px; font-weight:bold; color:#222;">{{$r['order']}}</td></tr>
                                @if(!empty($r['package']))
                                <tr><td style="padding:4px 18px 2px; font-size:13px; color:#888;">Package</td></tr>
                                <tr><td style="padding:0 18px 8px; font-size:16px; font-weight:bold; color:#222;">{{$r['package']}}</td></tr>
                                @endif
                                @if(!empty($r['price']))
                                <tr><td style="padding:4px 18px 2px; font-size:13px; color:#888;">Price</td></tr>
                                <tr><td style="padding:0 18px 14px; font-size:18px; font-weight:bold; color:#ff5a0e;">{{$r['price']}}</td></tr>
                                @else
                                <tr><td style="padding:0 0 8px;"></td></tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                    @endif

                    {{-- Sender --}}
                    <tr>
                        <td class="pad" style="padding:24px 30px 6px;">
                            <div style="font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase; color:#999; margin-bottom:10px;">{{$isJob ? 'Applicant' : 'Customer'}}</div>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:15px;">
                                <tr>
                                    <td class="row-label" width="110" style="padding:8px 0; color:#888; border-bottom:1px solid #f0f0f0; vertical-align:top;">Name</td>
                                    <td class="row-value" style="padding:8px 0; color:#222; font-weight:bold; border-bottom:1px solid #f0f0f0;">{{$r['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="row-label" width="110" style="padding:8px 0; color:#888; border-bottom:1px solid #f0f0f0; vertical-align:top;">Email</td>
                                    <td class="row-value" style="padding:8px 0; border-bottom:1px solid #f0f0f0; word-break:break-all;"><a href="mailto:{{$r['email']}}" style="color:#2e8fd9; text-decoration:none;">{{$r['email']}}</a></td>
                                </tr>
                                @if($isJob)
                                <tr>
                                    <td class="row-label" width="110" style="padding:8px 0; color:#888; border-bottom:1px solid #f0f0f0; vertical-align:top;">Position</td>
                                    <td class="row-value" style="padding:8px 0; color:#222; font-weight:bold; border-bottom:1px solid #f0f0f0;">{{$r['position']}}</td>
                                </tr>
                                @if(!empty($r['cv_name']))
                                <tr>
                                    <td class="row-label" width="110" style="padding:8px 0; color:#888; border-bottom:1px solid #f0f0f0; vertical-align:top;">CV</td>
                                    <td class="row-value" style="padding:8px 0; color:#222; border-bottom:1px solid #f0f0f0;">&#128206; {{$r['cv_name']}} <span style="color:#999;">(attached)</span></td>
                                </tr>
                                @endif
                                @elseif(!empty($r['subject']))
                                <tr>
                                    <td class="row-label" width="110" style="padding:8px 0; color:#888; border-bottom:1px solid #f0f0f0; vertical-align:top;">Subject</td>
                                    <td class="row-value" style="padding:8px 0; color:#222; border-bottom:1px solid #f0f0f0;">{{$r['subject']}}</td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>

                    {{-- Message --}}
                    @if(!empty($r['message']))
                    <tr>
                        <td class="pad" style="padding:18px 30px 6px;">
                            <div style="font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase; color:#999; margin-bottom:10px;">Message</div>
                            <div style="background:#f7f8fa; border-radius:8px; padding:16px 18px; font-size:15px; line-height:1.6; color:#333;">{!! nl2br(e($r['message'])) !!}</div>
                        </td>
                    </tr>
                    @endif

                    {{-- Reply button --}}
                    <tr>
                        <td class="pad" align="left" style="padding:22px 30px 28px;">
                            <a class="btn" href="mailto:{{$r['email']}}?subject={{rawurlencode($replySubject)}}" style="display:inline-block; background:{{$accent}}; color:#ffffff; text-decoration:none; font-size:15px; font-weight:bold; padding:12px 26px; border-radius:6px;">Reply to {{\Illuminate\Support\Str::limit($r['name'], 25)}}</a>
                            <div style="font-size:12px; color:#999; margin-top:10px;">Or just press "Reply" in your mail app &mdash; it goes to the {{$isJob ? 'applicant' : 'customer'}}.</div>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td class="pad" align="center" style="background:#2d2d2d; padding:20px 30px; font-size:12px; line-height:1.7; color:#bbb;">
                            <b style="color:#fff;">{{$c['name']}}</b> &middot; {{$c['tagline']}}<br>
                            {{rtrim($c['address'], '.')}}<br>
                            {{$c['phones']['Sales']}} &middot; <a href="mailto:{{$c['email']}}" style="color:#ffb08a; text-decoration:none;">{{$c['email']}}</a> &middot; <a href="https://{{$c['website']}}" style="color:#ffb08a; text-decoration:none;">{{$c['website']}}</a>
                            <div style="color:#888; margin-top:8px;">This email was sent automatically from the {{$c['website']}} website form.</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
