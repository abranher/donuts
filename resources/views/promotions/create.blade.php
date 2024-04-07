<x-layout title="Promociones - crear" :vite="['js/flowbite.min.js', 'js/promotions/create-promotions.js']" react notifications>

  <x-main.admin>
    <x-title title="Promociones - Crear" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"></div>
    </section>
  </x-main.admin>

  <script>
    const promotion = @js($promotion);
  </script>
</x-layout>
