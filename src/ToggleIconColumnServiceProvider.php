<?php

namespace Archilex\ToggleIconColumn;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ToggleIconColumnServiceProvider extends PackageServiceProvider
{
    protected array $styles = [
        'plugin-filament-toggle-icon-column' => __DIR__.'/../resources/dist/filament-toggle-icon-column.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-toggle-icon-column')
            ->hasAssets()
            ->hasViews();
    }
}
