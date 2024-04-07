@props([
    'code' => 'Código',
    'message_title' => 'Tituto',
    'message_subtitle' => 'Subtitulo',
])

<div class="flex items-center justify-center min-h-screen bg-white dark:bg-dark px-10 py-48">
  <div class="flex flex-col">

    <!-- Error Container -->
    <div class="flex flex-col items-center">
      <div class="text-violet-500 font-bold text-[120px]">
        {{ $code }}
      </div>

      <div class="font-bold text-gray-700 dark:text-gray-300 text-center text-4xl lg:text-6xl md:text-5xl mt-10">
        {{ $message_title }}
      </div>

      <div class="text-gray-400 text-center font-medium text-xl lg:text-2xl mt-8">
        {{ $message_subtitle }}
      </div>
    </div>

    <!-- Continue With -->
    <div class="mt-10 space-y-6 flex flex-col items-center">
      <x-button size="lg" href="{{ route('home') }}">
        Ir al home
      </x-button>
    </div>
  </div>
</div>
