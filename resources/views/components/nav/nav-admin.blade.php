<header
  class="fixed top-0 w-full {{ request()->routeIs('deliveries.map') ? 'z-[1200]' : 'z-50' }} bg-white dark:bg-dark-card border-b border-gray-200 dark:bg-dark-card dark:border-gray-600">
  <nav class="items-center text-black dark:text-gray-500 py-5 px-5 flex justify-between">

    <section class="flex justify-center items-center gap-3">
      {{-- boton para abrir el navbar --}}
      <x-nav.button-sidebar />
      <div class="flex justify-center items-center text-3xl font-bold tracking-tight cursor-default">
        <img class="inline w-10 h-10 rounded-full" src="{{ asset('img/logo.jpeg') }}" alt="Donuts Maker Logo">
      </div>
    </section>

    <section class="flex justify-center items-center gap-5">

      {{-- boton del buscador --}}
      <button type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-50 dark:hover:bg-opacity-5 dark:focus:ring-gray-600">
        <svg
          class="w-7 h-7 text-gray-700 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600"
          fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path
            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
        </svg>
      </button>

      {{-- boton del notificaciones --}}
      <span id="notifications" class="flex justify-center items-center"></span>

      {{-- avatar --}}
      <x-nav.user-dropdown />

    </section>
  </nav>
</header>
