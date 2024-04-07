<x-layout.pdf-reports title="Hola">

  <section class="w-full">
    <section class="w-36 h-36 m-auto">
      <img class="w-36 h-36 text-center m-auto" src="{{ public_path('img/logo.jpeg') }}" alt="Logo Donuts Maker">
    </section>
    <section class="w-full text-center h-36 m-auto text-4xl">
      <h2 class="w-full">{{ config('app.name') }}</h2>
      <p class="text-lg">Fecha:</p>
      <p class="text-lg">
        {{ date('d-m-Y h:i a') }}
      </p>
    </section>
  </section>

  <main class="w-full">
    <section class="w-full mb-5 text-3xl">
      <h2 class="w-full">Listado de productos</h2>
    </section>

    <x-report-table :cols="[__('Product'), __('Code')]">
      <x-slot name="content">
        @foreach ($products as $product)
          <tr>
            <x-report-table.td>
              {{ $product->name }}
            </x-report-table.td>

            <x-report-table.td>
              {{ $product->code }}
            </x-report-table.td>
          </tr>
        @endforeach
      </x-slot>
    </x-report-table>
  </main>

</x-layout.pdf-reports>
