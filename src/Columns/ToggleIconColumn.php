<?php

namespace Archilex\ToggleIconColumn\Columns;

use Filament\Forms\Components\Concerns\HasToggleColors;
use Filament\Forms\Components\Concerns\HasToggleIcons;
use Filament\Support\Actions\Concerns\HasSize;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Concerns\CanBeValidated;
use Filament\Tables\Columns\Concerns\CanUpdateState;
use Filament\Tables\Columns\Contracts\Editable;

class ToggleIconColumn extends Column implements Editable
{
    use CanBeValidated;
    use CanUpdateState;
    use HasToggleColors;
    use HasToggleIcons;
    use HasSize;

    protected string|Closure|null $hoverColor = null;

    protected string $view = 'filament-toggle-icon-column::columns.toggle-icon-column';

    protected function setUp(): void
    {
        parent::setUp();

        $this->disableClick();

        $this->rules(['boolean']);
    }

    public function getStateIcon(): ?string
    {
        $state = $this->getState();

        return $state ? $this->getOnIcon() : $this->getOffIcon();
    }

    public function getStateColor(): ?string
    {
        $state = $this->getState();

        return $state ? $this->getOnColor() : $this->getOffColor();
    }

    public function getOffColor(): ?string
    {
        return $this->evaluate($this->offColor) ?? 'secondary';
    }

    public function getOnColor(): ?string
    {
        return $this->evaluate($this->onColor) ?? 'primary';
    }

    public function getOffIcon(): ?string
    {
        return $this->evaluate($this->offIcon) ?? 'heroicon-o-x-circle';
    }

    public function getOnIcon(): ?string
    {
        return $this->evaluate($this->onIcon) ?? 'heroicon-o-check-circle';
    }

    public function hoverColor(string|Closure|null $color = null): static
    {
        $this->hoverColor = $color;

        return $this;
    }

    public function getHoverColor(): ?string
    {
        return $this->evaluate($this->hoverColor) ?? 'success';
    }
}
