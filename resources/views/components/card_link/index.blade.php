@props([
    'title' => 'titulo',
    'subtitle' => 'subtitulo',
    'img' => '',
    'href' => '',
])

<a href="{{ $href }}"
  {{ $attributes->class('flex mb-4 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700') }}>
  <img class="object-cover w-full rounded-t-lg h-86 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
    src="{{ $img }}" alt="Image">
  <div class="flex flex-col justify-between p-4 leading-normal">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
      {{ $title }}
    </h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
      {{ $subtitle }}
    </p>
  </div>
</a>
