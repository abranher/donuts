<x-layout title="Pedidos" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Pedidos de Repartidores" />

    <x-simple-table :cols="[__('Delivery Man'), __('Identification Card'), __('Phone Number'), __('Assigned Order')]">
      <x-slot name="title">
        Listado de Pedidos de Repartidores
      </x-slot>
      <x-slot name="extra">
        <span></span>
      </x-slot>
      <x-slot name="content">
        @foreach ($delivery_men as $delivery_man)
          <x-table.tr>
            <x-table.td>
              {{ $delivery_man->id }}
            </x-table.td>

            <x-table.td>
              {{ $delivery_man->user->name . ' - ' . $delivery_man->user->username }}
            </x-table.td>

            <x-table.td>
              {{ IDCARD($delivery_man->user->identificationCard->type, $delivery_man->user->identificationCard->identification_number) }}
            </x-table.td>

            <x-table.td>
              {{ phone($delivery_man->user->phone->code_phone, $delivery_man->user->phone->phone_number) }}
            </x-table.td>

            <x-table.td>
              @forelse ($delivery_man->deliveries as $delivery)
                <p class="{{ colorDelivery($delivery->status) }}">
                  {{ 'Pedido N° ' . $delivery->invoice_order_id . ' - ' . statusDelivery($delivery->status) }}
                </p>
              @empty
                <p>No Tiene Pedidos Asignados</p>
              @endforelse
            </x-table.td>
          </x-table.tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $delivery_men->links() }}
      </x-slot>
    </x-simple-table>
  </x-main.admin>

</x-layout>
