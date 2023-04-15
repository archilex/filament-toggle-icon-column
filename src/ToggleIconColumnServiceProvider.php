<?php

namespace Archilex\ToggleIconColumn;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class ToggleIconColumnServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-toggle-icon-column';

    protected array $styles = [
        'plugin-filament-toggle-icon-column' => __DIR__.'/../resources/dist/filament-toggle-icon-column.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasAssets()
            ->hasViews();
    }
}
