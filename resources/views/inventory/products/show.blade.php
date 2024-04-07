<x-layout title="Inventario Productos - Ver" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Inventario Productos - Ver" />

    {{-- tabla de datos --}}
    <section class="w-full bg-white dark:bg-dark-card">
      <div class="p-4 dark:bg-dark-card">
        <div>
          <h4 class="mb-1.5 leading-none text-4xl font-semibold text-gray-900 dark:text-white">
            {{ $product->name }}
          </h4>
          <h5 class="mb-5 text-xl font-bold text-gray-900 dark:text-white">
            {{ $product->price }} Bs.D
          </h5>
        </div>
        <button type="button" id="readProductClosed"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fillRule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clipRule="evenodd" />
          </svg>
          <span class="sr-only">Cerrar menu</span>
        </button>
        <div class="grid grid-cols-3 gap-4 mb-4 sm:mb-5">
          <div class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="iMac Side Image" />
          </div>
          <div class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
            <img src="https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png"
              alt="imagen" />
          </div>
          <div class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
            <img src="https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-back-image.png"
              alt="iMac Back Image" />
          </div>
        </div>
        <dl class="sm:mb-5">
          <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
            Detalles
          </dt>
          <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
            {{ $product->description }}
          </dd>
        </dl>
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div
            class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
              Envío
            </dt>
            <dd class="flex items-center text-gray-500 dark:text-gray-400">
              <svg class="w-4 h-4 mr-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fillRule="evenodd"
                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                  clipRule="evenodd" />
              </svg>
              Venezuela, Colombia
            </dd>
          </div>
          <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
              Sold by
            </dt>
            <dd class="text-gray-500 dark:text-gray-400">Flowbite</dd>
          </div>
          <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
              Ships from
            </dt>
            <dd class="text-gray-500 dark:text-gray-400">Flowbite</dd>
          </div>
        </div>
        <div class="flex bottom-0 left-0 justify-center pb-4 space-x-4 w-full">
          <x-button color="danger">
            <x-icons.eye-slash class="mr-1.5 -ml-1" />
            Ocultar
          </x-button>
          <button type="button"
            class="text-white w-full inline-flex items-center justify-center bg-violet-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center active:bg-violet-800">
            <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fillRule="evenodd"
                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                clipRule="evenodd" />
            </svg>
            Editar
          </button>
        </div>
      </div>
    </section>
  </x-main.admin>

</x-layout>
