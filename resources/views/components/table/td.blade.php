@props(['class' => 'px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white'])

<td {{ $attributes->class($class) }}>
  {{ $slot }}
</td>
