<section
  class="fixed bottom-0 left-0 {{ request()->routeIs('deliveries.map') ? 'z-[1200]' : 'z-50' }} w-full h-16 bg-white border-t border-gray-200 dark:bg-dark-card dark:border-gray-600">
  <div class="flex justify-around w-full h-full max-w-lg mx-auto font-medium">
    <a href="{{ route('home') }}"
      class="inline-flex flex-col items-center justify-center px-4 hover:bg-gray-50 dark:hover:bg-opacity-5 group">
      <x-icons.home
        class="mb-2 text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('home') ? 'text-violet-600 dark:text-violet-600' : '' }}" />
      <span
        class="text-sm text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('home') ? 'text-violet-600 dark:text-violet-600' : '' }}">Inicio</span>
    </a>
    <a href="{{ route('shop') }}"
      class="inline-flex flex-col items-center justify-center px-4 hover:bg-gray-50 dark:hover:bg-opacity-5 group">
      <x-icons.bag-shopping
        class="mb-2 text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('shop') ? 'text-violet-600 dark:text-violet-600' : '' }}" />
      <span
        class="text-sm text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('shop') ? 'text-violet-600 dark:text-violet-600' : '' }}">Market</span>
    </a>
    <a href="{{ route('recipes.create') }}"
      class="inline-flex flex-col items-center justify-center px-4 hover:bg-gray-50 dark:hover:bg-opacity-5 group">
      <x-icons.pencil
        class="mb-2 text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('personalizar.inicio') ? 'text-violet-600 dark:text-violet-600' : '' }}" />
      <span
        class="text-sm text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('personalizar.inicio') ? 'text-violet-600 dark:text-violet-600' : '' }}">Diseñador</span>
    </a>
    <a href="{{ route('user-deliveries.index') }}"
      class="inline-flex flex-col items-center justify-center px-4 hover:bg-gray-50 dark:hover:bg-opacity-5 group">
      <x-icons.motorcycle
        class="mb-2 text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('delivery.user.delivery') ? 'text-violet-600 dark:text-violet-600' : '' }}" />
      <span
        class="text-sm text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('delivery.user.delivery') ? 'text-violet-600 dark:text-violet-600' : '' }}">Delivey</span>
    </a>
    @role(App\Enums\Role::ADMIN)
      <a href="{{ route('admin.dashboard') }}"
        class="inline-flex flex-col items-center justify-center px-4 hover:bg-gray-50 dark:hover:bg-opacity-5 group">
        <x-icons.admin
          class="mb-2 text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('admin.dashboard') ? 'text-violet-600 dark:text-violet-600' : '' }}" />
        <span
          class="text-sm text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('admin.dashboard') ? 'text-violet-600 dark:text-violet-600' : '' }}">Admin</span>
      </a>
    @endrole
    @role(App\Enums\Role::DELIVERY_MAN)
      <a href="{{ route('delivery-man.index') }}"
        class="inline-flex flex-col items-center justify-center px-4 hover:bg-gray-50 dark:hover:bg-opacity-5 group">
        <x-icons.truck
          class="mb-2 text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('repartidor.index') ? 'text-violet-600 dark:text-violet-600' : '' }}" />
        <span
          class="text-sm text-gray-500 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600 {{ request()->routeIs('repartidor.index') ? 'text-violet-600 dark:text-violet-600' : '' }}">Repartidor</span>
      </a>
    @endrole
  </div>
</section>
