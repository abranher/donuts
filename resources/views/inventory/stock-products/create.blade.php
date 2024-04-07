<x-layout title="Inventario Productos - Registrar Entrada" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Inventario Productos - Registrar Entradas" />

    <div class="w-full" x-data="stockProducts">
      <div class="px-3 py-6 md:px-10 lg:x-20">
        <div
          class="p-7 bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm flex flex-col gap-8">
          <div>
            <x-table.title>
              Buscador de Productos
            </x-table.title>
            <div class="w-96">
              <form class="flex items-center">
                <label for="simple-search" class="sr-only">
                  Buscar
                </label>
                <div class="relative w-full">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                      viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fillrule="evenodd" cliprule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                      </path>
                    </svg>
                  </div>
                  <input type="text" @keyup="search" x-model="inputSearch" placeholder="Buscar Producto"
                    class="bg-gray-50 border border-gray-300 focus:border-gray-400 dark:focus:border-gray-700 text-gray-900 text-sm rounded-lg focus:outline-none block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
              </form>
            </div>

            <template x-if="products != null">
              <template x-if="search.length != 0">
                <div class="relative">
                  <div class="absolute top-0 left-0 z-50 max-w-lg w-[32rem]">

                    <template x-for="result in search">

                      <a @click="addResultToForm(result)"
                        class="flex px-4 py-3 border-b hover:bg-gray-200 bg-gray-100 cursor-pointer">
                        <div class="flex-shrink-0">
                          <img class="rounded-full w-11 h-11" :src=`${result.image1}` :alt="result.name">
                        </div>
                        <div class="w-full pl-3">
                          <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                            <p class="text-base text-gray-800 font-medium" x-text="result.name"></p>
                          </div>
                          <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                            <p class="font-medium">En stock: 123</p>
                          </div>
                        </div>
                      </a>

                    </template>

                  </div>
                </div>
              </template>
            </template>

          </div>

          <form @submit="addProductToCart">
            <x-table.title title="Datos de la producto a añadir" />
            <div class="flex gap-3 flex-col xl:flex-row">
              <input type="hidden" name="product_id" :value="product.product_id">
              <div class="relative z-0 w-full">
                <input type="text" id="name" name="name"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                  placeholder=" " :value="product.name" readonly>
                <label for="name"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                  Producto *
                </label>
              </div>
              <div class="relative z-0 w-full">
                <input type="number" id="quantity"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                  placeholder=" " name="quantity" :value="product.quantity">
                <label for="quantity"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                  Cantidad *
                </label>
              </div>
              <div class="relative z-0 w-full">
                <input type="date" id="expires_at"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                  placeholder=" " name="expires_at" :value="product.expires_at">
                <label for="expires_at"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                  Fecha de expiración *
                </label>
              </div>

              <div class="flex justify-center items-end">
                <x-button color="light">
                  Agregar
                </x-button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="px-3 py-6 md:px-10 lg:x-20">
        <div
          class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
          <!-- Card header -->
          <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
              <x-table.title>
                Entradas a Registrar
              </x-table.title>
            </div>
          </div>
          <!-- Table -->
          <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                      <tr>
                        <th scope="col"
                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                          N°
                        </th>
                        <th scope="col"
                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                          Producto
                        </th>
                        <th scope="col"
                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                          Cantidad
                        </th>
                        <th scope="col"
                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                          Fecha de expiración
                        </th>
                        <th scope="col"
                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                          Acciones
                        </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-gray-800">
                      <template x-for="product in productsInCart" :key="product.product_id">
                        <tr>
                          <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white"
                            x-text="product.product_id"></td>
                          <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400"
                            x-text="product.name"></td>
                          <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white"
                            x-text="product.quantity"></td>
                          <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white"
                            x-text="product.expires_at"></td>
                          <td class="p-4 whitespace-nowrap">
                            <x-button color="danger" @click="removeProductFromCart(product)">
                              <x-icons.trash />
                              Eliminar
                            </x-button>
                          </td>
                        </tr>
                      </template>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-6 flex justify-end gap-3">
            <div class="flex items-center lg:mx-4">
              <template x-if="productsInCart.length != 0">
                <x-button @click="sendRequest">
                  Guardar
                </x-button>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-main.admin>

</x-layout>
