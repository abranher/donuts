<x-layout title="Delivery - Repartidor" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <x-title title="Pedidos" />

    <div class="w-full p-4">
      <h2 class="text-2xl font-bold">Listado de pedidos asignados</h2>
    </div>

    <section class="w-full flex justify-center items-center flex-col md:flex-wrap gap-6">
      @forelse ($deliveries as $delivery)
        <section
          class="p-6 w-11/12 flex-grow bg-slate-50 dark:bg-dark-card shadow-lg md:h-72 rounded-lg border border-slate-200 dark:border-gray-500 flex justify-between flex-col gap-6">
          <h2 class="text-2xl font-bold dark:text-gray-300">Nuevo pedido - Pedido N°
            {{ $delivery->invoiceOrder->id }}</h2>

          <div class="flex flex-col gap-2 text-lg">
            <div class="flex gap-2 justify-start items-center">
              <x-icons.user />
              <p class="dark:text-gray-300 font-medium">Cliente:
                {{ $delivery->invoiceOrder->user->name }} </p>
            </div>
            <div class="flex gap-2 justify-start items-start">
              <x-icons.marker-map />
              <p class="dark:text-gray-300 font-medium">Ubicación:
                {{ fullAddress($delivery->invoiceOrder->user->address->address, $delivery->invoiceOrder->user->address->municipality->name, $delivery->invoiceOrder->user->address->state->name) }}
              </p>
            </div>
          </div>

          <div class="grid sm:grid-cols-2 sm:gap-56">
            <div
              class="text-lg font-bold py-1 pr-2 flex justify-center items-center gap-2 {{ colorDelivery($delivery->status) }}">
              {{ statusDelivery($delivery->status) }}
              @if ($delivery->status == $DeliveryStatus['ACCEPTED'])
                <x-icons.check />
              @endif
            </div>

            <x-button class="btn-primary-sm" href="{{ route('delivery-man.edit', $delivery->invoiceOrder->id) }}">
              Ver pedido
            </x-button>
          </div>
        </section>
      @empty
        <section
          class="w-full text-gray-600 bg-white px-4 py-8 text-xl font-bold text-center dark:text-white rounded-t-lg dark:bg-dark">
          Aun no tienes pedidos asignados
        </section>
      @endforelse
    </section>

    <div class="w-full p-4">
      <h2 class="text-2xl font-bold">Listado de pedidos finalizados</h2>
    </div>

    <section class="w-full flex justify-center items-center flex-col md:flex-wrap gap-6">
      @forelse ($deliveriesDelivered as $delivery)
        <section
          class="p-6 w-11/12 flex-grow bg-slate-50 dark:bg-dark-card shadow-lg md:h-72 rounded-lg border border-slate-200 dark:border-gray-500 flex justify-between flex-col gap-6">
          <h2 class="text-2xl font-bold dark:text-gray-300">Pedido Finalizado - Pedido N°
            {{ $delivery->invoiceOrder->id }}</h2>

          <div class="flex flex-col gap-2 text-lg">
            <div class="flex gap-2 justify-start items-center">
              <x-icons.user />
              <p class="dark:text-gray-300 font-medium">Cliente:
                {{ $delivery->invoiceOrder->user->name }} </p>
            </div>
            <div class="flex gap-2 justify-start items-start">
              <x-icons.marker-map />
              <p class="dark:text-gray-300 font-medium">Ubicación:
                {{ fullAddress($delivery->invoiceOrder->user->address->address, $delivery->invoiceOrder->user->address->municipality->name, $delivery->invoiceOrder->user->address->state->name) }}
              </p>
            </div>
          </div>

          <div class="grid sm:grid-cols-2 sm:gap-56">
            <div
              class="text-lg font-bold py-1 pr-2 flex justify-center items-center gap-2 {{ colorDelivery($delivery->status) }}">
              {{ statusDelivery($delivery->status) }}
              <div class="inline-flex">
                <x-icons.check-double />
              </div>
            </div>

            <x-button class="btn-primary-sm" href="{{ route('delivery-man.edit', $delivery->invoiceOrder->id) }}">
              Ver pedido finalizado
            </x-button>
          </div>
        </section>
      @empty
        <section
          class="w-full text-gray-600 bg-white px-4 py-8 text-xl font-bold text-center dark:text-white rounded-t-lg dark:bg-dark">
          Aun no tienes pedidos finalizados
        </section>
      @endforelse
    </section>
  </x-main.user>

</x-layout>
