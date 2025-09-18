@props([
    'danger' => null
])

<button {{ $attributes
    ->merge(['type' => 'button'])
    ->class([
         'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest
         focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
         transition ease-in-out duration-150',

         'bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500
         text-gray-700 dark:text-gray-300 shadow-sm
         hover:bg-gray-50 dark:hover:bg-gray-700
         dark:focus:ring-offset-gray-800 disabled:opacity-25'
            => !$danger,

         'bg-white dark:bg-gray-800 border border-red-300 dark:border-red-500
         text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700
         dark:focus:ring-offset-gray-800 disabled:opacity-25'
            => $danger,
    ]) }}
>
    {{ $slot }}
</button>
