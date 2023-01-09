<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::first();

        $global_variables = [
            'app_name' => $settings->app_name,

            'admin' => [
                'email' => $settings->admin_email,
            ],

            /*
          |--------------------------------------------------------------------------
          | Social Media Links
          |--------------------------------------------------------------------------
          |
          | This option controls the social media links available across the app
          |
          */
            'socials' => [
                'facebook' => $settings->facebook,
                'twitter' => $settings->twitter,
                'instagram' => $settings->instagram,
                'whatsapp' => $settings->whatsapp,
                'email' => $settings->email,
                'youtube' => $settings->youtube_video,
            ],

            /*
          |--------------------------------------------------------------------------
          | Finance
          |--------------------------------------------------------------------------
          |
          | This option controls the financial settings of the app
          |
          */
            'currency' => $settings->currency,
            'referral_worth' => $settings->referral_worth,
            'cashout_day' => $settings->cashout_day,
            'referral_cashout_day' => $settings->referral_cashout_day,
            'welcome_bonus' => $settings->welcome_bonus,
            'sponsored_post' => $settings->sponsored_post,
            'daily_login_bonus' => $settings->daily_login_bonus,
            'withdrawal_charge' => $settings->withdrawal_charge,
        ];

        $fp = fopen(base_path('config/myglobals.php'), 'w');
        fwrite($fp, '<?php return ' . var_export($global_variables, true) . ';');
        fclose($fp);
    }
}
