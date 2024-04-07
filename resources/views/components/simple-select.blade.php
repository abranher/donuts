@props([
    'noDefault' => false,
    'name' => 'name',
    'required' => true,
    'size' => 'sm',
    'value',
    'content' => '',
])

@php
  $sizes = [
      'sm' => 'w-16',
      'md' => 'w-20',
      'lg' => 'w-26',
      'xl' => 'w-32',
      '2xl' => 'w-44',
      '3xl' => 'w-52',
      '4xl' => 'w-64',
      'full' => 'w-full',
  ];
@endphp

<select name="{{ $name }}" id="{{ $name }}"
  class="{{ $sizes[$size] }} bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block py-1 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
  placeholder="" @required($required) {{ $attributes }}>
  @if (!$noDefault)
    <option disabled value="">--Seleccionar--</option>
  @elseif ($noDefault)
    <option value="">--Seleccionar--</option>
  @endif

  {{ $content }}
</select>
