<x-layout title="Pedidos" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Pedidos" />

    <x-simple-table :cols="[
        __('User'),
        __('Order Code'),
        __('Identification Card'),
        __('Phone Number'),
        __('Amount Total'),
        __('Payment Method'),
        __('Payment Reference'),
        __('Address'),
        __('Add Delivery Man'),
        __('Verification'),
        __('Order Status'),
        __('Last Update'),
        __('ACTIONS'),
    ]">
      <x-slot name="title">
        Listado de {{ __('Orders') }}
      </x-slot>
      <x-slot name="extra">
        <span></span>
      </x-slot>
      <x-slot name="content">
        @foreach ($invoice_orders as $invoice_order)
          <x-table.tr>

            <x-table.td>
              {{ $invoice_order->id }}
            </x-table.td>

            <x-table.td>
              {{ $invoice_order->user->name . ' - ' . $invoice_order->user->username }}
            </x-table.td>

            <x-table.td>
              {{ $invoice_order->code }}
            </x-table.td>

            <x-table.td>
              {{ IDCARD($invoice_order->user->identificationCard->type, $invoice_order->user->identificationCard->identification_number) }}
            </x-table.td>

            <x-table.td>
              {{ phone($invoice_order->user->phone->code_phone, $invoice_order->user->phone->phone_number) }}
            </x-table.td>

            <x-table.td>
              {{ $invoice_order->total }}
            </x-table.td>

            <x-table.td>
              {{ $invoice_order->payment_method }}
            </x-table.td>

            <x-table.td>
              {{ $invoice_order->payment_reference }}
            </x-table.td>

            <x-table.td>
              {{ address($invoice_order->user->address->address) }}
            </x-table.td>

            @if ($invoice_order->status == $InvoiceOrderStatus['UNVERIFIED'])
              <x-table.td>
                ¡No puedes asignar sin antes verificar!
              </x-table.td>
            @elseif ($invoice_order->status == $InvoiceOrderStatus['UNASSIGNED'])
              <x-table.td>
                <form x-data="assignDeliveryMan" @submit="verify"
                  action="{{ route('deliveries.assignDeliveryMan', $invoice_order->id) }}" method="POST"
                  class="flex flex-col gap-2 justify-center items-center">
                  @csrf
                  <x-simple-select name="delivery_man_id" size="lg">
                    <x-slot name="content">
                      @foreach ($delivery_men as $delivery_man)
                        <option value="{{ $delivery_man->id }}">
                          {{ deliveryManVehicle($delivery_man->user->name, $delivery_man->vehicle_type) }}
                        </option>
                      @endforeach
                    </x-slot>
                  </x-simple-select>

                  <button type="submit" class="btn-primary-sm">Asignar</button>
                </form>
              </x-table.td>
            @elseif ($invoice_order->status == $InvoiceOrderStatus['IN_PROGRESS'])
              @if ($invoice_order->delivery->status != $DeliveryStatus['ACCEPTED'])
                <x-table.td>
                  <form x-data="changeDeliveryMan" @submit="verify"
                    action="{{ route('deliveries.changeDeliveryMan', $invoice_order->id) }}" method="POST"
                    class="flex flex-col gap-2 justify-center items-center">
                    @csrf

                    <x-simple-select name="delivery_man_id" size="lg">
                      <x-slot name="content">
                        @foreach ($delivery_men as $delivery_man)
                          <option value="{{ $delivery_man->id }}">
                            {{ deliveryManVehicle($delivery_man->user->name, $delivery_man->vehicle_type) }}
                          </option>
                        @endforeach
                      </x-slot>
                    </x-simple-select>

                    <button type="submit" class="btn-primary-sm">Cambiar</button>
                  </form>
                </x-table.td>
              @else
                <x-table.td>
                  <span class="px-4 py-3 font-medium text-sm text-blue-500 dark:text-blue-500 whitespace-nowrap">
                    Ya ha sido aceptado por el repartidor
                  </span>
                </x-table.td>
              @endif
            @elseif ($invoice_order->status == $InvoiceOrderStatus['FINISHED'])
              <x-table.td>
                <div class="py-1 px-3 text-green-600 dark:text-green-600 flex justify-center items-center gap-2">
                  <p class="font-bold">
                    Completado
                  </p>
                  <x-icons.check />
                </div>
              </x-table.td>
            @endif

            @if ($invoice_order->status == $InvoiceOrderStatus['UNVERIFIED'])
              <x-table.td>
                <form x-data="VerifyOrder" @submit="verify" class="flex flex-col gap-2 justify-center items-center"
                  action="{{ route('invoice-orders.verify', $invoice_order->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn-primary-sm">Verificar</button>
                </form>
              </x-table.td>
            @else
              <x-table.td>
                <div class="py-1 px-3 text-green-600 dark:text-green-600 flex justify-center items-center gap-2">
                  <p class="font-bold">
                    Verificado
                  </p>
                  <x-icons.check />
                </div>
              </x-table.td>
            @endif

            <x-table.td class="px-4 py-3 font-bold whitespace-nowrap">
              <span class="{{ colorInvoice($invoice_order->status) }}">
                {{ statusInvoice($invoice_order->status) }}
              </span>
            </x-table.td>

            <x-table.td>
              {{ $invoice_order->updated_at }}
            </x-table.td>

            <x-table.td>
              <x-button class="btn-primary-sm" color="light"
                href="{{ route('invoice-orders.showOrder', $invoice_order->id) }}">
                <x-icons.eye />
                Ver pedido
              </x-button>
            </x-table.td>
          </x-table.tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $invoice_orders->links() }}
      </x-slot>
    </x-simple-table>
  </x-main.admin>

</x-layout>
