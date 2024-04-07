@props(['class' => 'space-y-4 md:space-y-6 flex flex-col gap-3'])

<form {{ $attributes->class($class) }} method="POST">
  @csrf

  {{ $slot }}
</form>
