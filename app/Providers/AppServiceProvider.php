<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer('layouts.english', function($view)
        {
            $request = "http://api.openweathermap.org/data/2.5/weather?id=360630&units=metric&appid="+ env('OPENWEATHERMAP', 'secret');
            $weather = json_decode(file_get_contents($request));
            $view->with('weather', $weather);

            $site_content = \App\Admin\SiteContent\Sitecontent::pluck('content', 'code');
            $view->with('site_content', $site_content);
        });

        view()->composer('en.includes.sidebar', function($view)
        {
            $last = \App\Admin\Items\Item::take(5)->inRandomOrder()->get();
            $view->with('last', $last);
        });

        view()->composer('en.includes.toursSideBar', function($view)
        {
            $last = \App\Admin\Company\TravelTour::take(5)->inRandomOrder()->get();
            $view->with('last', $last);
        });

        view()->composer('en.includes.shandaSideBar', function($view)
        {
            $last = \App\Admin\Company\ShandaLodge::take(5)->inRandomOrder()->get();
            $view->with('last', $last);
        });

        view()->composer('en.includes.egytatSideBar', function($view)
        {
            $last = \App\Admin\Company\Egytat::take(5)->inRandomOrder()->get();
            $view->with('last', $last);
        });

        Validator::extend('recaptcha','App\\Validators\\ReCaptcha@validate');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
