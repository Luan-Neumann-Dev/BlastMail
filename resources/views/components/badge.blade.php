@props([
    'danger' => false,
    'warning' => false
])

<span {{ $attributes->class([
    'rounded-sm w-fit border px-2 py-1 text-xs font-medium text-white dark:text-white',
    'border-red-500 bg-red-500 dark:border-red-500 dark:bg-red-500' => $danger,
    'border-amber-500 bg-amber-500 dark:border-amber-500 dark:bg-amber-500' => $warning,
    ]) }} >
    {{$slot}}
</span>
