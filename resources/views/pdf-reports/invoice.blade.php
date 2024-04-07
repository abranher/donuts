<x-layout.pdf-reports>

  <div class="bg-white px-6 py-8 mx-auto mt-8 w-full">
    <header class="w-full">
      <section class="w-36 h-36 m-auto">
        <img class="w-36 h-36 text-center m-auto" src="{{ public_path('img/logo.jpeg') }}" alt="Logo Donuts Maker">
      </section>
    </header>
    <h1 class="font-bold text-2xl my-4 text-center text-blue-600">{{ config('app.name') }}</h1>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">
      <h1 class="text-lg font-bold">Factura</h1>
      <div class="text-gray-700">
        <div>Pedido N° {{ $invoiceOrder->id }}</div>
        <div>Código de Factura: {{ $invoiceOrder->code }}</div>
        <div>Fecha: {{ $invoiceOrder->created_at }} </div>
      </div>
    </div>
    <div class="mb-8">
      <h2 class="text-lg font-bold mb-4">Cliente: </h2>
      <div class="text-gray-700 mb-2">{{ $customer->name }}</div>
      <div class="text-gray-700">{{ $customer->email }}</div>
      <div class="text-gray-700 mb-2">{{ $customer->username }}</div>
      <div class="text-gray-700 mb-2">
        {{ fullAddress($customer->address->address, $customer->address->municipality->name, $customer->address->state->name) }}
      </div>
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

    <br><br>
    <div class="text-gray-700 mb-2 text-xl font-semibold">¡Gracias por tu compra!</div>
    <div class="text-gray-700 text-base">¡Esperamos verte de nuevo!</div>
  </div>

</x-layout.pdf-reports>
