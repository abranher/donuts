<x-layout title="Inventario productos" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Inventario de productos" />

    <x-table :cols="[
        __('Product'),
        __('Code'),
        __('Image'),
        __('Category'),
        'Precio actual',
        'Precio venta',
        __('Description'),
        __('Size'),
        'Mín-Stock',
        'Máx-Stock',
        'Última actualización',
        'ACCIONES',
    ]" :create="route('products.create')" button-name="Añadir producto" :linkTo="route('stock-products.index')"
      link-name="Stocks de Productos" report :route-report="route('products.report-pdf')" :route-download="route('products.download-pdf')">
      <x-slot name="title">
        Listado de productos
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
              {{ $product->code }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center justify-center">
                <img src="{{ $product->picture_url_product }}" alt="{{ $product->name }}"
                  class="h-12 w-auto aspect-video" />
              </div>
            </x-table.td>

            <x-table.td>
              {{ $product->categoryProduct->name }}
            </x-table.td>

            <x-table.td>
              {{ $product->price }}
            </x-table.td>

            <x-table.td>
              {{ round($product->price + $product->price * 0.16, 2) }}
            </x-table.td>

            <x-table.td>
              {{ sub($product->description) }}
            </x-table.td>

            <x-table.td>
              {{ $product->size }}
            </x-table.td>

            <x-table.td>
              {{ $product->min_stock }}
            </x-table.td>

            <x-table.td>
              {{ $product->max_stock }}
            </x-table.td>

            <x-table.td>
              {{ $product->updated_at }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('products.show', $product->id) }}">
                  <x-button type="button" color="light">
                    <x-icons.eye class="mr-2" />
                    Ver
                  </x-button>
                </a>
                <a href="{{ route('products.edit', $product->id) }}">
                  <x-button type="button">
                    <x-icons.pencil-edit class="mr-2 -ml-0.5" />
                    Editar
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
