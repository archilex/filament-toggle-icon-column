# A Toggle Icon Column for Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/archilex/filament-toggle-icon-column.svg?style=flat-square)](https://packagist.org/packages/archilex/filament-toggle-icon-column)
[![run-tests](https://github.com/archilex/filament-toggle-icon-column/actions/workflows/run-tests.yml/badge.svg)](https://github.com/archilex/filament-toggle-icon-column/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/archilex/filament-toggle-icon-column.svg?style=flat-square)](https://packagist.org/packages/archilex/filament-toggle-icon-column)

While developing [Filament Filter Sets](https://filamentphp.com/plugins/filter-sets), a premium plugin that lets you save your existing filters into one easily accessible filter set, I needed a toggleable icon column to give users an easy way to see the status of their filter sets and interact with them as well. Out of this, Toggle Icon Column was born. 

Toggle Icon Column is a mashup of Filament's interactive Toggle Column and the Icon Column allowing an **icon** to be toggled on or off in a table, with different icons and colors representing it's different states. 

It should be noted that Filament's current Toggle Column is a more obvious and intuitive UX for most people and even supports [icons in the toggle button](https://filamentphp.com/docs/2.x/forms/fields#toggle). However, for some, like myself, Toggle Icon Column will give you a great way to add some visual distinction to your tables.

## Bug notice

As Toggle Icon Column uses the same code base as the current Toggle Column implementation, it also shares the same [bugs](https://github.com/filamentphp/filament/issues/6215). [One PR](https://github.com/filamentphp/filament/pull/6198) is already implemented in this code base, which fixes the console errors. As the Toggle Column gets updated, I will update this package as well.

## Installation

You can install the package via composer:

```bash
composer require archilex/filament-toggle-icon-column
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-toggle-icon-column-views"
```

## Usage

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;

return $table
    ->columns([
        ToggleIconColumn::make('is_active'),
    ]);
```

### Customizing the icon

You may customize the icon representing each state. Icons are the name of a Blade component present. By default, Heroicons v1 are installed:

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
 
ToggleIconColumn::make('is_locked')
    ->onIcon('heroicon-s-lock-open')
    ->offIcon('heroicon-o-lock-closed')
```

### Customizing the size

The default icon size is `lg`, but you may customize the size to be either `xs`, `sm`, `md`, `lg` or `xl`:

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
 
ToggleIconColumn::make('is_locked')
    ->size('xl')
```

### Customizing the color

You may customize the icon color representing the `on` or `off` state. These may be either `primary`, `secondary`, `success`, `warning`, `danger`, or `secondary`:

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
 
ToggleIconColumn::make('is_locked')
    ->onColor('primary')
    ->offColor('secondary')
```

### Customizing the hover color

By default the hover color will be the inverse of the `on/off` colors. These may also be either `primary`, `secondary`, `success`, `warning`, `danger`, or `secondary`. 

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
 
ToggleIconColumn::make('is_locked')
    ->hoverColor('success')
```

For further customization you can call a `Closure`.

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
 
ToggleIconColumn::make('is_locked')
    ->hoverColor(fn (Model $record) => $record->is_locked ? 'text-gray-300' : 'text-success-500'),
```

### Other options
As ToggleIconColumn extends Filament's `Column` class, most other methods are available as well such as:

```php
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
 
ToggleIconColumn::make('is_bookmarked')
    ->label('Bookmark status')
    ->translateLabel()
    ->alignCenter()
    ->disabled(fn () => ! auth()->user()->isAdmin())
    ->tooltip(fn (Model $record) => $record->is_bookmarked ? 'Unbookmark' : 'Bookmark')
    ->sortable()
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kenneth Sese](https://github.com/archilex)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
