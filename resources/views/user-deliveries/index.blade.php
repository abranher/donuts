<x-layout title="Delivery" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <section>
      <div class="max-w-3xl my-8 mx-auto px-4 pt-16 pb-24 flex justify-center items-center flex-col">
        <div class="mb-8 bg-pink-100 rounded-full w-52 flex justify-center items-center border-4 border-pink-500">
          <img src="{{ asset('img/caja_mispedidos.png') }}" class="inline-block w-44 h-52">
        </div>
        <h2 class="text-gray-600 dark:text-gray-300 font-medium text-3xl mb-3">
          Aun no se han realizado pedidos!
        </h2>
        <p class="text-gray-600 dark:text-gray-400">
          Aquí aparecerán las etapas en las que se hallen tus pedidos
        </p>
        <div class="mt-10">
          <a href="{{ route('shop') }}" class="btn-primary">Navega
            por nuestro catálogo</a>
        </div>
      </div>
    </section>
  </x-main.user>

</x-layout>
