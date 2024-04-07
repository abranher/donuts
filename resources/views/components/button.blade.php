@props([
    'type' => 'submit',
    'color' => 'primary',
    'size' => 'w-full',
])

@php
  $sizes = [
      'sm' => 'w-16',
      'md' => 'w-20',
      'lg' => 'w-26',
      'xl' => 'w-32',
      'w-full' => 'w-full',
  ];

  $colors = [
      'primary' => 'text-white bg-violet-600 active:bg-violet-700 focus:outline-none',
      'light' => 'text-gray-900 bg-white border border-gray-300 active:bg-gray-100 focus:outline-none dark:bg-transparent dark:text-gray-300 dark:border-gray-600 dark:active:bg-gray-800',
      'success' => 'text-white bg-green-600 active:bg-green-700 focus:outline-none',
      'right' => 'text-white bg-blue-600 active:bg-blue-700 focus:outline-none',
      'warning' => 'text-white bg-yellow-400 active:bg-yellow-500 focus:outline-none',
      'danger' => 'text-white bg-red-600 active:bg-red-700 focus:outline-none',
  ];

  $classes = "$sizes[$size] py-2 px-3 inline-flex justify-center items-center gap-3 text-base font-medium rounded-lg text-center $colors[$color]";
@endphp

@if ($attributes->has('href'))
  <a {{ $attributes->class($classes) }}>
    {{ $slot }}
  </a>
@else
  <button {{ $attributes->class($classes)->merge(['type' => $type]) }}>
    {{ $slot }}
  </button>
@endif
