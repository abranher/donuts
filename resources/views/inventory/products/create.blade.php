<x-layout title="Inventario Productos - crear" :vite="['js/flowbite.min.js', 'js/inventory/inv-pro/create-product.js']" react notifications>

  <x-main.admin>
    <x-title title="Inventario Productos - Crear" />

    {{-- formulario para crear recurso --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"></div>
    </section>
  </x-main.admin>

  <script>
    const categories = @json($categories);
    const sizes = @json($sizes);
  </script>
</x-layout>
