<div key="{{ $idProduct }}" class="flex justify-center items-center font-sans flex-col">
  <div class="w-48">
    <img src="img/Donacentral.jpg" alt="imagen de la dona" class="inset-0 w-full h-full object-cover rounded-t-md"
      loading="lazy" />
  </div>
  <form class="flex-auto p-4 w-56" action="">
    <div class="flex justify-center items-start flex-col">
      <h1 class="flex-auto font-medium text-slate-900 dark:text-gray-200">{{ $nameProduct }}</h1>
      <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
        ${{ $priceProduct }}
      </div>
      <div class="text-sm font-medium text-green-500">
        En stock
      </div>
    </div>
    <div class="flex justify-center items-center mt-2.5 mb-5">
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
      <svg class="w-4 h-4 text-gray-600 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 22 20">
        <path
          d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
      </svg>
      <span
        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
    </div>
    <div class="flex items-baseline mt-4 pb-4">
      <div class="space-x-2 flex text-sm font-bold">
        <label>
          <input class="sr-only peer" name="size" type="radio" value="p" checked />
          <div
            class="w-8 h-8 rounded-full flex justify-center items-center text-violet-400 peer-checked:bg-violet-600 peer-checked:text-white">
            P
          </div>
        </label>
        <label>
          <input class="sr-only peer" name="size" type="radio" value="m" />
          <div
            class="w-8 h-8 rounded-full flex justify-center items-center text-violet-400 peer-checked:bg-violet-600 peer-checked:text-white">
            M
          </div>
        </label>
        <label>
          <input class="sr-only peer" name="size" type="radio" value="g" />
          <div
            class="w-8 h-8 rounded-full flex justify-center items-center text-violet-400 peer-checked:bg-violet-600 peer-checked:text-white">
            G
          </div>
        </label>
      </div>
    </div>
    <div class="flex justify-center space-x-4 text-sm font-medium">
      <div class="flex-auto flex justify-center items-center">
        <button class="btn-primary-rounded" type="submit">Add to cart</button>
      </div>
    </div>
    <p class="mt-3 text-sm text-slate-600 dark:text-gray-200">Envío gratuito en todos sus pedidos.</p>
  </form>
</div>
