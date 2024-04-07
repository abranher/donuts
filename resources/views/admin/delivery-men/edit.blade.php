<x-layout title="Listado de repartidores - editar" :vite="['js/flowbite.min.js', 'js/admin/delivery-men/edit.js']" react notifications>

  <x-main.admin>
    <x-title title="Listado de Repartidores - Editar" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"
        data-route-update="{{ route('delivery-men.update', $delivery_man->id) }}"
        data-route-index="{{ route('delivery-men.index') }}" data-csrf="{{ csrf_token() }}">
      </div>
    </section>
  </x-main.admin>

  <script>
    const vehicleType = @json($vehicle_type);
    const typeIdentificationCard = @json($typeIdentificationCard);
    const phoneCodes = @json($phoneCodes);
    const states = @json($states);
    const municipalities = @json($municipalities);
    const delivery_man = @json($delivery_man);
  </script>

</x-layout>
