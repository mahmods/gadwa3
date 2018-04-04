<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LocalizationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

        config([
            'laravellocalization.supportedLocales' => [
                'ar' => ['name' => 'Arabic', 'script' => 'Arab', 'native' => 'العربية', 'regional' => 'ar_AE', 'icon' => 'flag-icon-sa'],
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB', 'icon' => 'flag-icon-gb'],
                'sv' => ['name' => 'Swedish', 'script' => 'Latn', 'native' => 'svenska', 'regional' => 'sv_SE', 'icon' => 'flag-icon-sv'],
            ],

            'laravellocalization.useAcceptLanguageHeader' => false,

            'laravellocalization.hideDefaultLocaleInURL' => false,
        ]);
    }
}
