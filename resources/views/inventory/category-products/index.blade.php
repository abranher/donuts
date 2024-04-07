<x-layout title="Categorías Productos" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Categoría Productos" />

    <x-table :cols="['Código', 'Categoría', 'Última actualización', 'ACCIONES']" :create="route('category-products.create')" button-name="Añadir categoría" report :route-report="route('category-products.report-pdf')"
      :route-download="route('category-products.download-pdf')">
      <x-slot name="title">
        Listado de categorías
      </x-slot>
      <x-slot name="content">
        @foreach ($categories as $category)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $category->id }}
            </x-table.td>

            <x-table.td>
              {{ $category->code }}
            </x-table.td>

            <x-table.td>
              {{ $category->name }}
            </x-table.td>

            <x-table.td>
              {{ $category->updated_at }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('category-products.edit', $category->id) }}">
                  <x-button type="button">
                    <x-icons.pencil-edit class="mr-2 -ml-0.5" />
                    Editar
                  </x-button>
                </a>
                <form action="{{ route('category-products.destroy', $category->id) }}" method="POST">
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
        {{ $categories->links() }}
      </x-slot>
    </x-table>
  </x-main.admin>

</x-layout>
