@props(['class' => 'relative z-0 w-full'])

<div {{ $attributes->class($class) }}>
  {{ $slot }}
</div>
