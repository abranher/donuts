@props(['value'])

<div class="text-lg font-medium text-gray-500 dark:text-gray-300">
  {{ $value ?? $slot }}
</div>
