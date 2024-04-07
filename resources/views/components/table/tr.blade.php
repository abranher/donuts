@props(['class' => 'border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700'])

<tr {{ $attributes->class($class) }}>
  {{ $slot }}
</tr>
