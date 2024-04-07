<x-layout title="Promociones - Editar" :vite="['js/flowbite.min.js', 'js/promotions/edit_promotions.js']" react notifications>

  <x-main.admin>
    <x-title title="Promociones - Editar" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"></div>
    </section>
  </x-main.admin>

  <script>
    const promotion = @json($promotion);
  </script>
</x-layout>
