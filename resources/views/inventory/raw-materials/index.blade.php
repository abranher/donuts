<x-layout title="Inventario Materias Primas" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Inventario de Materias Primas" />

    <x-table :cols="[
        __('Product'),
        __('Code'),
        __('Image'),
        __('Category'),
        'Precio actual',
        'Precio venta',
        __('Description'),
        'Mín-Stock',
        'Máx-Stock',
        'Última actualización',
        'ACCIONES',
    ]" :create="route('products.create')" button-name="Añadir Materia" :linkTo="route('stock-raw-materials.index')"
      link-name="Stocks de {{ __('Raw Materials') }}">
      <x-slot name="title">
        Listado de {{ __('Raw Materials') }}
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
              {{ $raw_material->code }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center justify-center">
                <img src="{{ $raw_material->picture_url_product }}" alt="{{ $raw_material->name }}"
                  class="h-12 w-auto aspect-video" />
              </div>
            </x-table.td>

            <x-table.td>
              {{ $raw_material->categoryRawMaterial->name }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->price }}
            </x-table.td>

            <x-table.td>
              {{ round($raw_material->price + $raw_material->price * 0.16, 2) }}
            </x-table.td>

            <x-table.td>
              {{ sub($raw_material->description) }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->min_stock }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->max_stock }}
            </x-table.td>

            <x-table.td>
              {{ $raw_material->updated_at }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('raw-materials.show', $raw_material->id) }}">
                  <x-button type="button" color="light">
                    <x-icons.eye class="mr-2" />
                    Ver
                  </x-button>
                </a>
                <a href="{{ route('raw-materials.edit', $raw_material->id) }}">
                  <x-button type="button">
                    <x-icons.pencil-edit class="mr-2 -ml-0.5" />
                    Editar
                  </x-button>
                </a>
                <form action="{{ route('raw-materials.destroy', $raw_material->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <x-button color="danger">
                    <x-icons.trash class="mr-1.5 -ml-1" />
                    Borrar
                  </x-button>
                </form>
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
