<x-layout title="Delivery - Descripción de pedido" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <x-title title="Descripción de pedido" />

    <section class="w-full flex justify-center items-center flex-col md:flex-wrap gap-6">
      <section
        class="p-6 w-11/12 flex-grow bg-slate-50 dark:bg-dark-card shadow-lg rounded-lg border border-slate-200 dark:border-gray-500 flex justify-between flex-col gap-10">
        <div class="w-full">
          <h2 class="text-2xl font-bold dark:text-gray-100">Pedido N°
            {{ $invoice_order->id }}</h2>
        </div>

        {{-- User data --}}
        <div class="w-full flex flex-col gap-2">
          <h2 class="text-2xl font-bold dark:text-gray-300">Cliente: </h2>
          <div class="w-full">
            <div class="flex flex-col gap-2 text-lg">
              <div class="flex gap-2 justify-start items-center">
                <x-icons.user />
                <p class="dark:text-gray-300 font-medium">Cliente:
                  {{ $customer->name }}</p>
              </div>
            </div>
            <div class="flex flex-col gap-2 text-lg">
              <div class="flex gap-2 justify-start items-center">
                <x-icons.user />
                <p class="dark:text-gray-300 font-medium">Cédula:
                  {{ $customer->identificationCard->identification_number }}</p>
              </div>
            </div>
            <div class="flex flex-col gap-2 text-lg">
              <div class="flex gap-2 justify-start items-center">
                <x-icons.phone />
                <p class="dark:text-gray-300 font-medium">Télefono:
                  {{ phone($customer->phone->code_phone, $customer->phone->phone_number) }}</p>
              </div>
            </div>
          </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-300">Descripción de pedido: </h2>

        <x-tiny-table :cols="[__('Code'), __('Product'), __('Quantity'), __('Price'), __('Sale Price')]">
          <x-slot name="content">
            @foreach ($descriptionsPro as $description)
              <x-table.tr>
                <x-table.td>
                  {{ $description->product->code }}
                </x-table.td>

                <x-table.td>
                  {{ $description->product->name }}
                </x-table.td>

                <x-table.td>
                  {{ $description->quantity }}
                </x-table.td>

                <x-table.td>
                  {{ $description->product->price }}
                </x-table.td>

                <x-table.td>
                  {{ $description->product->sale_price }}
                </x-table.td>
              </x-table.tr>
            @endforeach

            @foreach ($descriptionsRec as $description)
              <x-table.tr>
                <x-table.td>
                  {{ $description->recipe->code }}
                </x-table.td>

                <x-table.td>
                  {{ $description->recipe->name }}
                </x-table.td>

                <x-table.td>
                  {{ $description->quantity }}
                </x-table.td>

                <x-table.td>
                  {{ $description->recipe->price }}
                </x-table.td>

                <x-table.td>
                  {{ $description->recipe->sale_price }}
                </x-table.td>
              </x-table.tr>
            @endforeach
            <x-table.tr>
              <x-table.td></x-table.td>
              <x-table.td></x-table.td>
              <x-table.td></x-table.td>
              <x-table.td>Total:</x-table.td>
              <x-table.td>{{ $invoice_order->total }}</x-table.td>
            </x-table.tr>
          </x-slot>
        </x-tiny-table>

        <div class="w-full flex flex-col gap-3 my-3">
          <div class="flex gap-2 flex-col items-start">
            <h2 class="text-2xl font-bold dark:text-gray-300">Total: </h2>
            <div class="flex gap-1 items-center">
              <x-icons.money-bill />
              <p class="text-lg font-medium">Precio total: </p>
              <span class="text-3xl font-bold">
                {{ $invoice_order->total }}
              </span>
            </div>
          </div>
        </div>

        <div class="w-full flex flex-col gap-3 my-4">
          <h2 class="text-2xl font-bold dark:text-gray-300">Dirección de entrega: </h2>
          <div class="flex gap-2 justify-start items-start">
            <x-icons.marker-map />
            <p class="dark:text-gray-300 font-medium">Dirección del pedido:
              {{ fullAddress($customer->address->address, $customer->address->municipality->name, $state->name) }}
            </p>
          </div>
        </div>

        @if ($delivery->status == $DeliveryStatus['UNACCEPTED'])
          <form class="flex justify-end w-full" action="{{ route('delivery-man.takeOrder', $invoice_order->id) }}"
            method="POST">
            @csrf
            <button type="submit" class="btn-primary-sm uppercase">tomar pedido</button>
          </form>
        @elseif ($delivery->status == $DeliveryStatus['ACCEPTED'])
          <form class="flex justify-end w-full" action="{{ route('delivery-man.finishOrder', $invoice_order->id) }}"
            method="POST">
            @csrf
            <button type="submit" class="btn-success-sm uppercase">finalizar
              pedido</button>
          </form>
        @endif

      </section>
    </section>
  </x-main.user>

</x-layout>
