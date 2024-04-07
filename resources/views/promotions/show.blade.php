<x-layout title="Promociones - Ver" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Promociones - Ver" />

    {{-- tabla de datos --}}
    <section class="w-full flex justify-center items-center">

      <div class="w-11/12" x-data="{
          addProduct: false,
          addCategory: false,
      }">
        <div class="bg-white dark:bg-dark-card shadow-lg p-3">
          <div
            class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <h2 class="mb-2 text-xl font-bold dark:text-white">Listado de productos
              asignados</h2>
          </div>
          <div class="flex flex-col items-start text-xl mx-4 py-4 border-t dark:border-gray-700">
            <div class="flex gap-1">
              <p class="font-bold">N°: </p>
              <p class="font-medium">{{ $promotion->id }}</p>
            </div>
            <div class="flex gap-1">
              <p class="font-bold">{{ __('Title') }}: </p>
              <p class="font-medium">{{ $promotion->title }}</p>
            </div>
            <div class="flex gap-1">
              <p class="font-bold">{{ __('discount') }}: </p>
              <p class="font-medium">{{ $promotion->discount . '%' }}</p>
            </div>
            <div class="flex flex-col gap-1">
              <p class="font-bold">{{ __('Description') }}: </p>
              <p class="font-medium">{{ $promotion->description }}</p>
            </div>
            <div class="flex flex-col gap-1">
              <p class="font-bold">{{ __('start date') }}: </p>
              <p class="font-medium">{{ $promotion->start_date }}</p>
            </div>
            <div class="flex flex-col gap-1">
              <p class="font-bold">{{ __('end date') }}: </p>
              <p class="font-medium">{{ $promotion->end_date }}</p>
            </div>
          </div>

          {{-- table products --}}
          <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 text-center dark:divide-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr class="text-center">
                        <th class="p-4">N°</th>
                        <th class="p-4">Producto</th>
                        <th class="p-4">ACCIONES</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($promotion->promotionalProducts as $promo)
                        <x-table.tr>
                          <x-table.td>
                            {{ $promo->id }}
                          </x-table.td>
                          <x-table.td>
                            @foreach ($products as $product)
                              @if ($product->id == $promo->product_id)
                                {{ $product->name }}
                              @endif
                            @endforeach
                          </x-table.td>
                          <x-table.td>
                            <div class="flex items-center justify-center">
                              <form action="{{ route('promotional-products.destroy', $promo->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                                <x-button color="danger">
                                  <x-icons.trash class="mr-1.5 -ml-1" />
                                  Eliminar
                                </x-button>
                              </form>
                            </div>
                          </x-table.td>
                        </x-table.tr>
                      @empty
                        <tr>
                          <td colspan="3" class="font-bold p-4 dark:text-gray-200">
                            <p class="mb-2">Aún no hay datos</p>
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div x-show="!addProduct" class="w-full flex justify-end my-4 p-3">
            <x-button size="md" type="button" @click="addProduct = true">
              Agregar
            </x-button>
          </div>

          <div x-show="addProduct" class="w-full">
            <div class="px-3 py-6 md:px-10 lg:x-20">
              <div
                class="p-7 bg-white dark:bg-transparent border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm flex flex-col gap-8">
                <form action="{{ route('promotional-products.store') }}" method="POST">
                  @csrf
                  <x-table.title>
                    Datos del producto a añadir
                  </x-table.title>
                  <div class="flex gap-3 flex-col xl:flex-row">
                    <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                    <div className="relative z-0 w-full">
                      <x-group_input.select noDefault size="4xl" name="product_id">
                        @foreach ($products as $product)
                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                      </x-group_input.select>
                      <x-group_input.label>
                        Descuento (%) *
                      </x-group_input.label>
                    </div>
                    <div class="flex justify-center gap-2 items-end">
                      <x-button color="light">
                        Agregar
                      </x-button>
                      <x-button color="light" type="button" @click="addProduct = false">
                        Descartar
                      </x-button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div
            class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <h2 class="mb-2 text-xl font-bold dark:text-white">Listado de categorías
              asignadas</h2>
          </div>

          {{-- table categories --}}
          <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 text-center dark:divide-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr class="text-center">
                        <th class="p-4">N°</th>
                        <th class="p-4">Categoría</th>
                        <th class="p-4">ACCIONES</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($promotion->promotionalCatProducts as $promo)
                        <x-table.tr>
                          <x-table.td>
                            {{ $promo->id }}
                          </x-table.td>
                          <x-table.td>
                            @foreach ($categories as $category)
                              @if ($category->id == $promo->category_product_id)
                                {{ $category->name }}
                              @endif
                            @endforeach
                          </x-table.td>
                          <x-table.td>
                            <div class="flex items-center justify-center">
                              <form action="{{ route('promotional-cat-products.destroy', $promo->id) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                                <x-button color="danger">
                                  <x-icons.trash class="mr-1.5 -ml-1" />
                                  Eliminar
                                </x-button>
                              </form>
                            </div>
                          </x-table.td>
                        </x-table.tr>
                      @empty
                        <tr>
                          <td colspan="3" class="font-bold p-4 dark:text-gray-200">
                            <p class="mb-2">Aún no hay datos</p>
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div x-show="!addCategory" class="w-full flex justify-end my-4 p-3">
            <x-button size="md" type="button" @click="addCategory = true">
              Agregar
            </x-button>
          </div>

          <div x-show="addCategory" class="w-full">
            <div class="px-3 py-6 md:px-10 lg:x-20">
              <div
                class="p-7 bg-white dark:bg-transparent border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm flex flex-col gap-8">
                <form action="{{ route('promotional-cat-products.store') }}" method="POST">
                  @csrf
                  <x-table.title>
                    Datos de la categoría a añadir
                  </x-table.title>
                  <div class="flex gap-3 flex-col xl:flex-row">
                    <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                    <div className="relative z-0 w-full">
                      <x-group_input.select noDefault size="4xl" name="category_product_id">
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </x-group_input.select>
                      <x-group_input.label>
                        Descuento (%) *
                      </x-group_input.label>
                    </div>
                    <div class="flex justify-center gap-2 items-end">
                      <x-button color="light">
                        Agregar
                      </x-button>
                      <x-button color="light" type="button" @click="addCategory = false">
                        Descartar
                      </x-button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
  </x-main.admin>

</x-layout>
