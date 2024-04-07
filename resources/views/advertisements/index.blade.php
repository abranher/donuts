<x-layout title="Anuncios" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Anuncios" />

    <x-table :cols="[__('Title'), __('Description'), __('Image'), __('Promotion'), 'Última actualización', 'ACCIONES']" :create="route('advertisements.create')" button-name="Crear Anuncio">
      <x-slot name="title">
        Listado de Anuncios
      </x-slot>
      <x-slot name="content">
        @foreach ($advertisements as $advertisement)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $advertisement->id }}
            </x-table.td>

            <x-table.td>
              {{ $advertisement->title }}
            </x-table.td>

            <x-table.td>
              {{ sub($advertisement->description) }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center justify-center">
                <img src="{{ $advertisement->picture_url_a_d }}" alt="{{ $advertisement->title }}"
                  class="h-12 aspect-video" />
              </div>
            </x-table.td>

            <x-table.td>
              {{ $advertisement->promotion->title }}
            </x-table.td>

            <x-table.td>
              {{ $advertisement->updated_at }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('coupons.edit', $advertisement->id) }}">
                  <x-button type="button">
                    <x-icons.pencil-edit class="mr-2 -ml-0.5" />
                    Editar
                  </x-button>
                </a>
                <form action="{{ route('coupons.destroy', $advertisement->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <x-button color="danger">
                    <x-icons.trash class="mr-1.5 -ml-1" />
                    Eliminar
                  </x-button>
                </form>
              </div>
            </x-table.td>
          </tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $advertisements->links() }}
      </x-slot>
    </x-table>
  </x-main.admin>

</x-layout>
