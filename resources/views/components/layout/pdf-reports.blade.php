@props(['title' => 'Reporte', 'default' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Donuts Maker - {{ $title ?? '' }}</title>
  <link rel="stylesheet" href="{{ public_path('css/tiny.css') }}" type="text/css">
</head>
<body>
  @if ($default)
    <header class="w-full">
      <section class="w-36 h-36 m-auto">
        <img class="w-36 h-36 text-center m-auto" src="{{ public_path('img/logo.jpeg') }}" alt="Logo Donuts Maker">
      </section>
      <section class="w-full text-center h-36 m-auto text-4xl">
        <h2 class="w-full text-blue-600 font-bold text-2xl">{{ config('app.name') }}</h2>
        <p class="text-lg">Fecha:</p>
        <p class="text-lg">
          {{ date('d-m-Y h:i a') }}
        </p>
      </section>
    </header>
  @endif
  {{ $slot }}

</body>
</html>
