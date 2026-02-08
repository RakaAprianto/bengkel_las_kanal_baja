<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
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
        // Share settings with all views
        try {
            $settings = [
                'whatsapp' => Setting::get('whatsapp', env('WHATSAPP_NUMBER', '6285693378749')),
                'company_name' => Setting::get('company_name', config('app.name', 'Laravel')),
                'company_email' => Setting::get('email', 'info@example.com'),
                'company_phone' => Setting::get('phone', ''),
            ];
            
            View::share('appSettings', (object) $settings);
        } catch (\Exception $e) {
            // If database is not ready yet (e.g., during migration)
            View::share('appSettings', (object) [
                'whatsapp' => env('WHATSAPP_NUMBER', '6285693378749'),
                'company_name' => config('app.name', 'Laravel'),
                'company_email' => 'info@example.com',
                'company_phone' => '',
            ]);
        }
    }
}
