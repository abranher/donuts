@props([
    'noDefault' => false,
    'name' => 'name',
    'required' => true,
    'options' => [],
    'size' => 'sm',
    'value',
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
  class="{{ $sizes[$size] }} px-2 focus:bg-violet-50 border focus:border-violet-600 text-gray-900 text-sm rounded-lg block py-2.5 dark:bg-gray-700 dark:focus:border-violet-600 dark:text-white "
  placeholder="" @required($required) {{ $attributes }}>
  @if (!$noDefault)
    <option disabled value="">--Seleccionar--</option>
  @elseif ($noDefault)
    <option value="">--Seleccionar--</option>
  @endif

  @forelse ($options as $option)
    @if (is_array($option))
      <option value="{{ $option['value'] }}">
        {{ $option['label'] }}
      </option>
    @elseif (is_string($option))
      <option value="{{ $option }}">
        {{ $option }}
      </option>
    @endif
  @empty
    {{ $slot }}
  @endforelse
</select>
