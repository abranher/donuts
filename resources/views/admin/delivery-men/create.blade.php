<x-layout title="Listado de repartidores - crear" :vite="['js/flowbite.min.js', 'js/admin/delivery-men/create.js']" react notifications>

  <x-main.admin>
    <x-title title="Listado de Repartidores - Crear" />

    {{-- formulario para crear recurso --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"
        data-route-store="{{ route('delivery-men.store') }}" data-route-index="{{ route('delivery-men.index') }}"
        data-csrf="{{ csrf_token() }}">
      </div>
    </section>
  </x-main.admin>

  <script>
    const vehicleType = @json($vehicle_type);
    const typeIdentificationCard = @json($typeIdentificationCard);
    const phoneCodes = @json($phoneCodes);
    const states = @json($states);
    const municipalities = @json($municipalities);
  </script>
</x-layout>
