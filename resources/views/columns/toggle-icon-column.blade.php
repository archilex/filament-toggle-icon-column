@php
    $state = $getState();
    $size = $getSize() ?? 'lg';
    $stateColor = $getStateColor();
    $stateIcon = $getStateIcon();
    $hoverColor = $getHoverColor();

    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        match ($stateColor) {
            'danger' => 'text-danger-500',
            'primary' => 'text-primary-500',
            'success' => 'text-success-500',
            'warning' => 'text-warning-500',
            'secondary' => \Illuminate\Support\Arr::toCssClasses(['text-gray-300', 'dark:text-gray-600' => config('tables.dark_mode'),]),
            null => \Illuminate\Support\Arr::toCssClasses(['text-gray-700', 'dark:text-gray-200' => config('tables.dark_mode'),]),
            default => $stateColor,
        },
        match ($hoverColor) {
            'danger' => \Illuminate\Support\Arr::toCssClasses(['hover:text-danger-500', 'dark:hover:text-danger-500' => config('tables.dark_mode'),]),
            'primary' => \Illuminate\Support\Arr::toCssClasses(['hover:text-primary-500', 'dark:hover:text-primary-500' => config('tables.dark_mode'),]),
            'success' => \Illuminate\Support\Arr::toCssClasses(['hover:text-success-500', 'dark:hover:text-success-500' => config('tables.dark_mode'),]),
            'warning' => \Illuminate\Support\Arr::toCssClasses(['hover:text-warning-500', 'dark:hover:text-warning-500' => config('tables.dark_mode'),]),
            'secondary' => \Illuminate\Support\Arr::toCssClasses(['hover:text-gray-300', 'dark:hover:text-gray-600' => config('tables.dark_mode'),]),
            null => \Illuminate\Support\Arr::toCssClasses(['hover:text-gray-700', 'dark:hover:text-gray-200' => config('tables.dark_mode'),]),
            default => 'hover:'.$hoverColor,
        },
        match ($size) {
            'xs' => 'h-3 w-3',
            'sm' => 'h-4 w-4',
            'md' => 'h-5 w-5',
            'lg' => 'h-6 w-6',
            'xl' => 'h-7 w-7',
            default => null,
        },
    ]);
@endphp

<div wire:key="{{ $this->id }}.table.record.{{ $recordKey }}.column.{{ $getName() }}.toggle-column.{{ $state ? 'true' : 'false' }}">
    <div
        x-data="{
            error: undefined,
            state: @js((bool) $state),
            isLoading: false,
        }"
        {{ $attributes->merge($getExtraAttributes())->class([
            'filament-toggle-icon-column',
        ]) }}
        wire:ignore
    >
        <button
            role="switch"
            aria-checked="false"
            x-bind:aria-checked="state.toString()"
            x-on:click="
                if (isLoading) {
                    return
                }

                state = ! state

                isLoading = true
                response = await $wire.updateTableColumnState(@js($getName()), @js($recordKey), state)
                error = response?.error ?? undefined

                if (error) {
                    state = ! state
                }

                isLoading = false
            "
            x-tooltip="error"
            x-bind:class="{
                'opacity-50 pointer-events-none': isLoading,
            }"
            {!! $isDisabled() ? 'disabled' : null !!}
            type="button"
            class="items-center justify-center flex shrink-0 h-10 w-10 border-transparent cursor-pointer outline-none disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none"
        >
            <span
                {{
                    $attributes
                        ->merge($getExtraAttributes())
                        ->class([
                            "filament-toggle-icon-column-size-{$size}",
                            '' => ! $isInline(),
                        ])
                }}
            >
                @if ($stateIcon)
                    <x-dynamic-component
                        :component="$stateIcon"
                        :class="$iconClasses"
                    />
                @endif
            </span>
        </button>
    </div>
</div>
