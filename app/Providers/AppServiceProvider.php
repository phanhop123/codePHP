<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Models\Category;
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
        //
        $data['categories'] = Category::get();
        view()->share($data);
    }
}
