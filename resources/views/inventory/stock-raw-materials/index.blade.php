<x-layout title="Inventario Materias Primas - Stocks" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Movimiento de Materias Primas" />

    <x-table :cols="[__('Raw Material'), 'mín-stock', 'Stock', 'máx-stock', 'ACCIONES']" :create="route('stock-raw-materials.create')" button-name="Registrar movimiento">
      <x-slot name="title">
        Listado de Stocks de {{ __('Raw Materials') }}
      </x-slot>
      <x-slot name="content">
        @foreach ($raw_materials as $raw_material)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $raw_material->id }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->name }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->min_stock }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->stock }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->max_stock }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('stock-raw-materials.show', $raw_material->id) }}">
                  <x-button type="button" color="light">
                    <x-icons.eye />
                    Ver Lotes
                  </x-button>
                </a>
              </div>
            </x-table.td>
          </tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $raw_materials->links() }}
      </x-slot>
    </x-table>
  </x-main.admin>

</x-layout>
