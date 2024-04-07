<x-layout title="Mis Pedidos" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <x-title title="Mis Pedidos" />

    @if ($invoice->count())
      <div class="w-full p-4">
        <h2 class="text-2xl font-bold">Listado de pedidos en Proceso</h2>
      </div>
      <div class="w-full px-8">
        <div class="w-full flex">
          <div class="w-full grid grid-cols-1 xl:grid-cols-2 gap-5">
            @foreach ($invoiceOrders as $invoiceOrder)
              <div
                class="w-full rounded-[30px] md:rounded-[36px] bg-slate-100 shadow-lg overflow-hidden border-[1px] border-slate-200 p-8 relative">
                <div class="h-full">
                  <div class="h-full z-10 relative">
                    <div class="flex flex-1 gap-6 justify-between h-full space-y-5">
                      <div class="flex justify-between flex-col">
                        <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                          <span>Pedido N° {{ $invoiceOrder->id }}</span>
                        </div>
                        <div class="text-xl md:text-xl font-bold text-gray-900 flex justify-between">
                          <span>Código {{ $invoiceOrder->code }}</span>
                        </div>
                        <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                          <div class="flex items-center align-bottom">
                            <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                              <span>{{ $invoiceOrder->total }}</span>
                            </div>
                            <span class="pt-1.5">Bs.D</span>
                          </div>
                          <div class="{{ colorInvoice($invoiceOrder->status) }}">
                            {{ statusInvoice($invoiceOrder->status) }}
                          </div>
                        </div>
                      </div>
                      <div class="pt-2 flex items-end">
                        <x-button href="{{ route('my-invoices.show', $invoiceOrder->id) }}" class="btn-primary-rounded">
                          Ver pedido
                          <x-icons.arrow-right />
                        </x-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="w-full p-4">
        <h2 class="text-2xl font-bold">Listado de pedidos Finalizados</h2>
      </div>
      <div class="w-full px-8">
        <div class="w-full flex">
          <div class="w-full grid grid-cols-1 2xl:grid-cols-2 gap-5">
            @forelse ($invoiceOrdersFinished as $invoiceOrder)
              <div
                class="w-full rounded-[30px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 p-8 relative">
                <div class="h-full">
                  <div class="h-full z-10 relative">
                    <div class="flex flex-1 gap-6 justify-between h-full space-y-5">
                      <div class="flex justify-between flex-col">
                        <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                          <span>Pedido N° {{ $invoiceOrder->id }}</span>
                        </div>
                        <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                          <div class="flex items-center align-bottom">
                            <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                              <span>{{ $invoiceOrder->total }}</span>
                            </div>
                            <span class="pt-1.5">Bs.D</span>
                          </div>
                          <div class="text-base {{ colorInvoice($invoiceOrder->status) }}">
                            {{ statusInvoice($invoiceOrder->status) }}
                          </div>
                        </div>
                      </div>
                      <div class="pt-2 flex items-end">
                        <x-button href="{{ route('my-invoices.show', $invoiceOrder->id) }}"
                          class="btn-primary-rounded">
                          Ver pedido
                          <x-icons.arrow-right />
                        </x-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <section
                class="w-full text-gray-600 bg-white px-4 py-8 text-xl font-bold text-center dark:text-white rounded-t-lg dark:bg-dark">
                Aun no tienes pedidos finalizados
              </section>
            @endforelse
          </div>
        </div>
      </div>
    @else
      <section>
        <div class="max-w-3xl my-8 mx-auto px-4 pt-16 pb-24 flex justify-center items-center flex-col">
          <div class="mb-8 bg-pink-100 rounded-full w-52 flex justify-center items-center border-4 border-pink-500">
            <img src="{{ asset('img/caja_mispedidos.png') }}" class="inline-block w-44 h-52">
          </div>
          <h2 class="text-gray-600 dark:text-gray-300 text-center font-medium text-3xl mb-3">
            Aun no se han realizado pedidos!
          </h2>
          <div class="mt-10">
            <a href="{{ route('shop') }}" class="btn-primary">Navega
              por nuestro catálogo</a>
          </div>
        </div>
      </section>
    @endif
  </x-main.user>

</x-layout>
