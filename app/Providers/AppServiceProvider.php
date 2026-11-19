<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Site settings live in the `generals` table. On a fresh install (before `php artisan migrate`)
        // that table does not exist yet, so skip quietly instead of crashing artisan.
        try {
            $g = general();
        } catch (\Throwable $e) {
            return;
        }
        if (!$g) {
            return;
        }

        \Config::set("services.facebook.client_id", $g->fb_app_id);
        \Config::set("services.facebook.client_secret", $g->fb_app_secret);
        \Config::set("services.facebook.redirect", $g->fb_app_redirect_url);

        \Config::set("services.google.client_id", $g->google_client_id);
        \Config::set("services.google.client_secret", $g->google_client_secret);
        \Config::set("services.google.redirect", $g->google_client_redirect_url);

        // Mail settings come from Admin > Mail Setting
        \Config::set("mail.mailers.smtp.transport", strtolower(trim((string) $g->mail_driver)) ?: 'smtp');
        \Config::set("mail.mailers.smtp.host", trim((string) $g->mail_host));
        \Config::set("mail.mailers.smtp.port", (int) $g->mail_port ?: 465);
        \Config::set("mail.mailers.smtp.encryption", strtolower(trim((string) $g->mail_encryption)) ?: null);
        \Config::set("mail.mailers.smtp.username", trim((string) $g->mail_username));
        \Config::set("mail.mailers.smtp.password", $g->mail_password);
        \Config::set("mail.mailers.smtp.timeout", 20);
        \Config::set("mail.from.address", $g->mail_from_address);
        \Config::set("mail.from.name", $g->mail_from_name);
    }
}
