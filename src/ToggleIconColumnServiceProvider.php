<?php

namespace Archilex\ToggleIconColumn;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ToggleIconColumnServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-toggle-icon-column')
            ->hasAssets()
            ->hasViews();
    }
}
