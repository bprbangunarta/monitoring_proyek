<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('Administrator', function(User $user) {
            return $user->role === 1 ;
        });

        Gate::define('Pengawas', function(User $user) {
            return $user->role === 2 ;
        });

        Gate::define('Manajer_Proyek', function(User $user) {
            return $user->role === 3 ;
        });
    }
    
}
