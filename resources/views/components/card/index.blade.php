@props([
    'title' => 'titulo',
    'size' => 'max-w-lg',
])

<div class="w-full {{ $size }} bg-white rounded-lg sm:shadow-xl border dark:bg-gray-800 dark:border-gray-700">
  <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <x-card.logo />
    <x-card.title :title="$title" />

    {{ $slot }}
  </div>
</div>
