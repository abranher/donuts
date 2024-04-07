<x-layout title="Inventario Materias Primas - Stocks" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Movimiento de Materias Primas" />

    <x-simple-table :cols="['Fecha de creación', 'Stocks']" :create="route('stock-raw-materials.create')">
      <x-slot name="title">
        Listado de Stocks de {{ __('Raw Material') }} por Lotes
      </x-slot>
      <x-slot name="extra">
        <div class="flex gap-1">
          <p class="font-bold">N°: </p>
          <p class="font-medium">{{ $raw_material->id }}</p>
        </div>
        <div class="flex gap-1">
          <p class="font-bold">Código: </p>
          <p class="font-medium">{{ $raw_material->code }}</p>
        </div>
        <div class="flex gap-1">
          <p class="font-bold">Nombre: </p>
          <p class="font-medium">{{ $raw_material->name }}</p>
        </div>
      </x-slot>
      <x-slot name="content">
        @foreach ($stock_raw_material as $key => $stock)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $loop->iteration }}
            </x-table.td>

            <x-table.td>
              {{ $key }}
            </x-table.td>

            <x-table.td>
              {{ $stock->stocks }}
            </x-table.td>
          </tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $stock_raw_material->links() }}
      </x-slot>
    </x-simple-table>
  </x-main.admin>

</x-layout>
