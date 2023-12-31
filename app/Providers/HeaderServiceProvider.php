<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\User;
use App\Models\Video;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        View::composer('layouts.header.header', function ($view) {
            $trackCount = Track::count();
            $courseCount = Course::count();
            $usersCount = User::where('admin',0)->count();
            $quizCount = Quiz::count();
            
            $view->with(compact('trackCount', 'courseCount', 'usersCount', 'quizCount'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
