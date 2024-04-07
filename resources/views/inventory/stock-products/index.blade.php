<x-layout title="Inventario Productos - Stocks" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Movimiento de Productos" />

    <x-table :cols="[__('Product'), 'mín-stock', 'Stock', 'máx-stock', 'ACCIONES']" :create="route('stock-products.create')" button-name="Registrar movimiento">
      <x-slot name="title">
        Listado de Stocks de {{ __('Products') }}
      </x-slot>
      <x-slot name="content">
        @foreach ($products as $product)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $product->id }}
            </x-table.td>

            <x-table.td>
              {{ $product->name }}
            </x-table.td>

            <x-table.td>
              {{ $product->min_stock }}
            </x-table.td>

            <x-table.td>
              {{ $product->stock }}
            </x-table.td>

            <x-table.td>
              {{ $product->max_stock }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('stock-products.show', $product->id) }}">
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
        {{ $products->links() }}
      </x-slot>
    </x-table>
  </x-main.admin>

</x-layout>
