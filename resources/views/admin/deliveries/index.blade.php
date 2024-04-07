<x-layout title="Deliveries - Listado" :vite="['js/flowbite.min.js']">

  <x-main.admin>
    <x-title title="Deliveries" />

    <x-simple-table :cols="[__('Delivery Man'), __('Order'), __('Delivery Status'), __('Last Update'), __('ACTIONS')]">
      <x-slot name="title">
        Listado de {{ __('Deliveries') }}
      </x-slot>
      <x-slot name="extra">
        <span></span>
      </x-slot>
      <x-slot name="content">
        @foreach ($deliveries as $delivery)
          <x-table.tr>

            <x-table.td>
              {{ $delivery->id }}
            </x-table.td>

            <x-table.td>
              {{ $delivery->deliveryMan->user->name . ' - ' . $delivery->deliveryMan->user->username }}
            </x-table.td>

            <x-table.td>
              {{ $delivery->invoiceOrder->id }}
            </x-table.td>

            <x-table.td class="px-4 py-3 font-bold whitespace-nowrap">
              <span class="{{ colorDelivery($delivery->status) }}">
                {{ statusDelivery($delivery->status) }}
              </span>
            </x-table.td>

            <x-table.td>
              {{ $delivery->updated_at }}
            </x-table.td>

            <x-table.td>
              <x-button class="btn-primary-sm" color="light"
                href="{{ route('invoice-orders.showOrder', $delivery->id) }}">
                <x-icons.eye />
                Ver delivery
              </x-button>
            </x-table.td>
          </x-table.tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $deliveries->links() }}
      </x-slot>
    </x-simple-table>

  </x-main.admin>

</x-layout>
