<x-layout title="Promociones" :vite="['js/flowbite.min.js', 'js/promotions/calendar.js']" react notifications>

  <x-main.admin>
    <x-title title="Promociones" />

    <x-table :cols="[
        __('Title'),
        __('Description'),
        __('start date'),
        __('end date'),
        __('discount'),
        'Última actualización',
        'ACCIONES',
    ]" :create="route('promotions.create')" button-name="Crear promoción">
      <x-slot name="title">
        Listado de Promociones
      </x-slot>
      <x-slot name="content">
        @foreach ($promotions as $promotion)
          <x-table.tr>
            <x-table.td>
              {{ $promotion->id }}
            </x-table.td>

            <x-table.td>
              {{ sub($promotion->title) }}
            </x-table.td>

            <x-table.td>
              {{ sub($promotion->description) }}
            </x-table.td>

            <x-table.td>
              {{ $promotion->start_date }}
            </x-table.td>

            <x-table.td>
              {{ $promotion->end_date }}
            </x-table.td>

            <x-table.td>
              {{ percent($promotion->discount) }}
            </x-table.td>

            <x-table.td>
              {{ $promotion->updated_at }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('promotions.show', $promotion->id) }}">
                  <x-button type="button" color="light">
                    <x-icons.eye class="mr-2" />
                    Ver
                  </x-button>
                </a>
                <a href="{{ route('promotions.edit', $promotion->id) }}">
                  <x-button type="button">
                    <x-icons.pencil-edit class="mr-2 -ml-0.5" />
                    Editar
                  </x-button>
                </a>
                <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <x-button color="danger">
                    <x-icons.trash class="mr-1.5 -ml-1" />
                    Eliminar
                  </x-button>
                </form>
              </div>
            </x-table.td>
          </x-table.tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $promotions->links() }}
      </x-slot>
    </x-table>

    {{-- Calendar --}}
    <section class="w-11/12 my-3" id="root"></section>
  </x-main.admin>

  <script>
    const promotions = @json($promosForCalendar);
  </script>
</x-layout>
