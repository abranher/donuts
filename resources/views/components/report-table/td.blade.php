@props(['class' => 'border-b border-gray-500 px-4 py-3 font-medium text-gray-900 whitespace-nowrap'])

<td {{ $attributes->class($class) }}>
  {{ $slot }}
</td>
