<x-layout title="Categorías Productos - editar" :vite="['js/flowbite.min.js', 'js/inventory/cat-pro/edit-cat-pro.js']" react notifications>

  <x-main.admin>
    <x-title title="Categoría Productos - Editar" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto">
      </div>
    </section>
  </x-main.admin>

  <script>
    const category = @js($category);
  </script>
</x-layout>
