<x-layout title="Inventario Productos - Stocks" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Movimiento de Productos" />

    <x-simple-table :cols="['Código de lote', 'Fecha de creación', 'Stocks']" :create="route('stock-products.create')">
      <x-slot name="title">
        Listado de Stocks de {{ __('Product') }} por Lotes
      </x-slot>
      <x-slot name="extra">
        <div class="flex gap-1 my-2">
          <p class="font-bold">Datos del Producto: </p>
        </div>
        <div class="flex gap-1">
          <p class="font-bold">N°: </p>
          <p class="font-medium">{{ $product->id }}</p>
        </div>
        <div class="flex gap-1">
          <p class="font-bold">Código: </p>
          <p class="font-medium">{{ $product->code }}</p>
        </div>
        <div class="flex gap-1">
          <p class="font-bold">Nombre: </p>
          <p class="font-medium">{{ $product->name }}</p>
        </div>
      </x-slot>
      <x-slot name="content">
        @foreach ($stock_product as $key => $stock)
          <x-table.tr>
            <x-table.td>
              {{ $loop->iteration }}
            </x-table.td>

            <x-table.td>
              {{ $stock->code }}
            </x-table.td>

            <x-table.td>
              {{ $key }}
            </x-table.td>

            <x-table.td>
              {{ $stock->stocks }}
            </x-table.td>
          </x-table.tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $stock_product->links() }}
      </x-slot>
    </x-simple-table>
  </x-main.admin>

</x-layout>
