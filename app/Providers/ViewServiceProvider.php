<?php

namespace App\Providers;

use App\Models\SettingGeneral;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        $settingGeneral = SettingGeneral::query()->first();
        \Illuminate\Support\Facades\View::share('settingGeneral', $settingGeneral);
    }
}
