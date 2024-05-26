<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Counselling;
use App\Models\CounsellingCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'Agriculture' => 'App\Models\CMSAgriculture',
            'Hospital' => 'App\Models\CMSHospital',
            'Education / Scholarship' => 'App\Models\CMSEducation',
        ]);

        View::composer('*', function ($view) {
            // $view->with('counsellingSection', Counselling::query()->with('counsellingCategory')->get());
            $view->with('counsellingSection', CounsellingCategory::query()->with('counselling')->get());
        });
    }
}
