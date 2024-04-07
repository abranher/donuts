<x-layout title="Mis Pedidos - Descripción de pedido" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <x-title title="Descripción de pedido" />

    <section class="w-full flex justify-center items-center flex-col md:flex-wrap gap-6">
      <section
        class="p-6 w-11/12 flex-grow bg-slate-50 dark:bg-dark-card shadow-lg rounded-lg border border-slate-200 dark:border-gray-500 flex justify-between flex-col gap-10">
        <div class="w-full flex justify-between">
          <h2 class="text-2xl font-bold dark:text-gray-100">
            Pedido N° {{ $invoiceOrder->id }}
          </h2>
          @if ($invoiceOrder->status != $InvoiceOrderStatus['UNVERIFIED'])
            <x-button color="light" size="lg" href="{{ route('my-invoices.download-pdf', $invoiceOrder->id) }}">
              <x-icons.file-invoice />
              Factura
            </x-button>
          @else
            <div class="text-base {{ colorInvoice($invoiceOrder->status) }}">
              {{ statusInvoice($invoiceOrder->status) }}
            </div>
          @endif
        </div>
        <div class="w-full flex">
          <h2 class="text-xl font-bold dark:text-gray-100">
            Código de Pedido {{ $invoiceOrder->code }}
          </h2>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-300">Descripción de pedido: </h2>

        <x-tiny-table :cols="[__('Code'), __('Product'), __('Quantity'), __('Sale Price')]">
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
                  {{ $description->recipe->sale_price }}
                </x-table.td>
              </x-table.tr>
            @endforeach
            <x-table.tr>
              <x-table.td></x-table.td>
              <x-table.td></x-table.td>
              <x-table.td>Total:</x-table.td>
              <x-table.td>{{ $invoiceOrder->total }}</x-table.td>
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
                {{ $invoiceOrder->total }}
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
      </section>
    </section>
  </x-main.user>

</x-layout>
