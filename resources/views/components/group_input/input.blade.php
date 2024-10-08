@props([
    'type' => 'text',
    'name' => 'name',
    'required' => true,
    'value',
])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
  placeholder="" value="{{ $value }}" @required($required) />
