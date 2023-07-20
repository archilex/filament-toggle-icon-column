<?php

namespace Archilex\ToggleIconColumn;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Css;

class ToggleIconColumnServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-toggle-icon-column')
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('filament-toggle-icon-column', __DIR__.'/../resources/dist/filament-toggle-icon-column.css'),
        ], 'archilex/filament-toggle-icon-column');
    }
}
