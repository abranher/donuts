<x-layout title="Tienda" :vite="['js/shop/shop.js', 'js/flowbite.min.js']" react notifications>

  <x-main.shop>
    <section class="max-w-xs max-lg:hidden w-full h-full overflow-auto">
      {{-- esta es la seccion del navbar --}}
      <x-menu-desktop.menu-d-user />

      <section class="py-8 mx-3 bg-white dark:bg-dark">
        <div class="flex justify-start items-center">
          <ul class="flex justify-center md:justify-start items-center flex-nowrap">
            <li
              class="flex justify-center items-center flex-col border dark:border-slate-600 border-slate-300 gap-2 p-4 rounded-lg text-slate-700 dark:text-slate-200">
              <div class="flex justify-center items-center flex-col gap-3 mb-3">
                <p class="font-bold">OFERTA TERMINA EN:</p>
                <div class="flex gap-2">
                  <div class="bg-slate-300 dark:bg-dark-card w-8 h-7 flex justify-center items-center rounded-md">
                    <p>1</p>
                  </div>
                  :
                  <div class="bg-slate-300 dark:bg-dark-card w-8 h-7 flex justify-center items-center rounded-md">
                    <p>13</p>
                  </div>
                  :
                  <div class="bg-slate-300 dark:bg-dark-card w-8 h-7 flex justify-center items-center rounded-md">
                    <p>14</p>
                  </div>
                  :
                  <div class="bg-slate-300 dark:bg-dark-card w-8 h-7 flex justify-center items-center rounded-md">
                    <p>1</p>
                  </div>
                </div>
              </div>
              <div class="w-11/12 aspect-video">
                <img src="img/Donacentral.jpg" alt="imagen de la dona" class="inset-0 w-full h-full object-cover"
                  loading="lazy" />
              </div>
              <div class="flex-auto p-4 w-full">
                <div class="flex justify-start items-center mt-2.5 mb-5">
                  <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                  </svg>
                  <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                  </svg>
                  <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                  </svg>
                  <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                  </svg>
                  <svg class="w-4 h-4 text-gray-600 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                  </svg>
                  <span
                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                    5.0
                  </span>
                </div>
                <div class="flex justify-center items-start flex-col">
                  <h1 class="flex-auto font-medium text-slate-900 dark:text-gray-200">
                    Dona de chocolate
                  </h1>
                  <div class="w-full flex gap-2 items-center mt-2 order-1">
                    <span class="text-3xl font-bold text-violet-600">
                      $4.99
                    </span>
                    <span class="text-xl line-through">$5.99</span>
                  </div>
                </div>
                <p class="mt-3 text-sm text-slate-600 dark:text-gray-200">
                  Envío gratuito en todos sus pedidos.
                </p>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </section>

    {{-- esta es la seccion central --}}
    <section id="tienda"
      class="py-20 gap-10 flex justify-center items-center flex-col text-slate-500 dark:text-slate-400 border-l border-gray-200 dark:border-gray-700 lg:w-[77%] w-full">
    </section>
  </x-main.shop>

  <script>
    const advertisements = @js($advertisements);
  </script>
</x-layout>
