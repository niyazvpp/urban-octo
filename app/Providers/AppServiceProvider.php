<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\URL::forceScheme('https');

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Qualification Management')
                    // ->icon('heroicon-s-shopping-cart')
                    ->extraSidebarAttributes(['class' => 'featured-sidebar-group'])
                // ->extraTopbarAttributes(['class' => 'featured-topbar-group']),
            ]);
        });
    }
}
