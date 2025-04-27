<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\About;
use App\Models\HeaderSetting;
use App\Models\AboutLandSurvey;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register any application services
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $menus = Menu::where('parent_id', null)->with('children')->get();
            $abouts = About::latest()->get();
            $headerSetting = HeaderSetting::first();
            $projects = AboutLandSurvey::latest()->take(5)->get();

            $view->with([
                'mainMenu' => $menus,
                'abouts' => $abouts,
                'headerSetting' => $headerSetting,
                'projects' => $projects,
            ]);
        });
    }
}