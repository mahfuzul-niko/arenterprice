<?php

namespace App\Providers;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        $roles = ['admin', 'user', 'agent'];
        foreach ($roles as $role) {
            Blade::if($role, function () use ($role) {
                return Auth::check() && Auth::user()->role == $role;
            });
        }
    }
    
}
