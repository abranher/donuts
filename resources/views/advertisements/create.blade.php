<x-layout title="Anuncios - crear" :vite="['js/flowbite.min.js', 'js/advertisements/create-advertisements.js']" react notifications>

  <x-main.admin>
    <x-title title="Anuncios - Crear" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"></div>
    </section>
  </x-main.admin>

  <script>
    const promotions = @js($promotions);
  </script>
</x-layout>
