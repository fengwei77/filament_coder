<?php

namespace App\Providers;

use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
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
        Filament::registerViteTheme('resources/css/filament.css');

        Filament::serving(function () {
            if (auth()->user()) {
                if (auth()->user()->is_admin === 1 && auth()->user()->hasAnyRole(['super-admin', 'admin', 'moderator'])) {
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Manager Users')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-s-key')
                    ]);
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Manager Permissions')
                            ->url(PermissionResource::getUrl())
                            ->icon('heroicon-s-users')
                    ]);
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Manager Roles')
                            ->url(RoleResource::getUrl())
                            ->icon('heroicon-s-cog')
                    ]);
                }
            }
        });
    }
}
