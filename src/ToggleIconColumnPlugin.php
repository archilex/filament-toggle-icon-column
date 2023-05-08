<?php

namespace Archilex\ToggleIconColumn;

use Filament\Context;
use Filament\Contracts\Plugin;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class ToggleIconColumnPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-toggle-icon-column';
    }

    public function register(Context $context): void
    {
        FilamentAsset::register([
            Css::make('filament-toggle-icon-column', __DIR__.'/../resources/dist/filament-toggle-icon-column.css'),
        ], 'filament-toggle-icon-column');
    }

    public function boot(Context $context): void
    {
        //
    }
}
