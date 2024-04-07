<x-layout.pdf-reports default>

  <main class="w-full">
    <section class="w-full mb-5 text-3xl">
      <h2 class="w-full">Listado de productos</h2>
    </section>

    <x-report-table :cols="[__('Code'), __('Product'), __('Price'), __('Category')]" :total="$products">
      <x-slot name="content">
        @foreach ($products as $product)
          <tr>
            <x-report-table.td>
              {{ $product->code }}
            </x-report-table.td>

            <x-report-table.td>
              {{ $product->name }}
            </x-report-table.td>

            <x-report-table.td>
              {{ $product->price }}
            </x-report-table.td>

            <x-report-table.td>
              {{ $product->categoryProduct->name }}
            </x-report-table.td>
          </tr>
        @endforeach
      </x-slot>
    </x-report-table>
  </main>

</x-layout.pdf-reports>
