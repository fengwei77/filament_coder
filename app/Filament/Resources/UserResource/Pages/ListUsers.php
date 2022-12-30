<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Route;

class ListUsers extends ListRecords
{

    protected static string $resource = UserResource::class;



    protected static function getNavigationLabel(): string
    {
        return static::$navigationLabel ?? static::$title ?? __('filament::pages/user.title');
    }

    protected function getWidgets(): array
    {
        return Filament::getWidgets();
    }

    protected function getColumns(): int|array
    {
        return 2;
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('filament::pages/user.title');
    }

    protected function getButtonTitle(): string
    {
        return static::$title ?? __('filament::pages/user.create');
    }

    protected static ?string $slug = 'custom-url-slug';

    protected function getActions(): array
    {
        $name = '';
//        dd(__('filament::pages/user.create'));
//        static fn(&$name): string => __('filament::pages/user.create');
        return [
            Actions\CreateAction::make()
                ->label(static fn(): string => __('filament::pages/user.create')),
        ];
    }
}
