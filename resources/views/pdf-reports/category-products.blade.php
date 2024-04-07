<x-layout.pdf-reports default>

  <main class="w-full">
    <section class="w-full mb-5 text-3xl">
      <h2 class="w-full">Listado de categorías de productos</h2>
    </section>

    <x-report-table :cols="[__('Code'), __('Category')]" :total="$category_products">
      <x-slot name="content">
        @foreach ($category_products as $category_product)
          <tr>
            <x-report-table.td>
              {{ $category_product->code }}
            </x-report-table.td>

            <x-report-table.td>
              {{ $category_product->name }}
            </x-report-table.td>
          </tr>
        @endforeach
      </x-slot>
    </x-report-table>
  </main>

</x-layout.pdf-reports>
