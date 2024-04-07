@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
  switch ($align) {
      case 'left':
          $alignmentClasses = 'origin-top-left start-0';
          break;
      case 'top':
          $alignmentClasses = 'origin-top';
          break;
      case 'right':
          $alignmentClasses = 'origin-top-right end-0';
          break;
      case 'bottom':
          $alignmentClasses = 'origin-bottom bottom-full';
          break;
  }

  switch ($width) {
      case '36':
          $width = 'w-36';
          break;
      case '48':
          $width = 'w-48';
          break;
      case '60':
          $width = 'w-60';
          break;
      case '80':
          $width = 'w-80';
          break;
      case 'full':
          $width = 'w-full';
          break;
      case 'auto':
          $width = 'w-auto';
          break;
  }
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
  <div @click="open = ! open">
    {{ $trigger }}
  </div>
  <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    class="absolute z-[1200] mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}" style="display: none;">
    <div
      class="shadow-md border border-gray-200 rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 w-full dark:border-gray-600 dark:bg-dark-card dark:divide-gray-600 {{ $contentClasses }}">
      {{ $content }}
    </div>
  </div>
</div>
