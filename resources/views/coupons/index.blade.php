<x-layout title="Cupones" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Cupones" />

    <x-table :cols="[
        __('Code'),
        __('discount'),
        __('expires'),
        __('Uses'),
        'Última actualización',
        'ACCIONES',
    ]" :create="route('coupons.create')" button-name="Crear cupón">
      <x-slot name="title">
        Listado de Cupones
      </x-slot>
      <x-slot name="content">
        @foreach ($coupons as $coupon)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $coupon->id }}
            </x-table.td>

            <x-table.td>
              {{ $coupon->code }}
            </x-table.td>

            <x-table.td>
              {{ percent($coupon->discount) }}
            </x-table.td>

            <x-table.td>
              {{ $coupon->expires_at }}
            </x-table.td>

            <x-table.td>
              {{ $coupon->uses }}
            </x-table.td>

            <x-table.td>
              {{ $coupon->updated_at }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('coupons.send', $coupon->id) }}">
                  <x-button color="right" type="button">
                    Enviar a los Usuarios
                  </x-button>
                </a>
                <a href="{{ route('coupons.edit', $coupon->id) }}">
                  <x-button type="button">
                    <x-icons.pencil-edit class="mr-2 -ml-0.5" />
                    Editar
                  </x-button>
                </a>
                <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST">
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
        {{ $coupons->links() }}
      </x-slot>
    </x-table>
  </x-main.admin>

</x-layout>
