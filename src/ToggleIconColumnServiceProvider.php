<?php

namespace Archilex\ToggleIconColumn;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class ToggleIconColumnServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-toggle-icon-column';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-filament-toggle-icon-column' => __DIR__.'/../resources/dist/filament-toggle-icon-column.css',
    ];

    protected array $scripts = [
        'plugin-filament-toggle-icon-column' => __DIR__.'/../resources/dist/filament-toggle-icon-column.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-filament-toggle-icon-column' => __DIR__ . '/../resources/dist/filament-toggle-icon-column.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
