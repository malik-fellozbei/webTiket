<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
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

        Gate::policy(\Spatie\Permission\Models\Role::class, \App\Policies\RolePolicy::class);
        Gate::policy(\Spatie\Permission\Models\Permission::class, \App\Policies\PermissionPolicy::class);
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });
        

        if (App::environment('local')) {
            $ngrokUrl = null;
            if (isset($_SERVER['HTTP_X_ORIGINAL_HOST'])) {
                $ngrokUrl = 'https://' . $_SERVER['HTTP_X_ORIGINAL_HOST'];
            } elseif (isset($_SERVER['HTTP_HOST']) && str_contains($_SERVER['HTTP_HOST'], '.ngrok-free.app')) {
                $ngrokUrl = 'https://' . $_SERVER['HTTP_HOST'];
            }

            if ($ngrokUrl) {
                URL::forceRootUrl($ngrokUrl);
                URL::forceScheme('https');
            }
        }
    }
}
