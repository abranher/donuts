<ul class="space-y-2 font-medium">
  <li>
    <a href="{{ route('users.index') }}"
      class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.users
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 whitespace-nowrap">Usuarios</span>
    </a>
  </li>
  <li>
    <a href="{{ route('delivery-men.index') }}"
      class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.delivery_men
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 whitespace-nowrap">Repartidores</span>
    </a>
  </li>
  <li x-data="{ showDropdown: false, }">
    <button type="button" @click="showDropdown = !showDropdown"
      class="w-full flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.file-invoice
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 text-left whitespace-nowrap">Pedidos</span>
      <span id="angle-up" :class="showDropdown && 'rotate'">
        <x-icons.angle-up
          class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      </span>
    </button>
    <ul x-show="showDropdown" class="py-2 space-y-2" x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95">
      <li>
        <a href="{{ route('invoice-orders.index') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Panel de pedidos</span>
        </a>
      </li>
      <li>
        <a href="{{ route('invoice-orders.show') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Pedidos de repartidores</span>
        </a>
      </li>
    </ul>
  </li>
  <li x-data="{ showDropdown: false, }">
    <button type="button" @click="showDropdown = !showDropdown"
      class="w-full flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.map-location
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 text-left whitespace-nowrap">Deliveries</span>
      <span id="angle-up" :class="showDropdown && 'rotate'">
        <x-icons.angle-up
          class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      </span>
    </button>
    <ul x-show="showDropdown" class="py-2 space-y-2" x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95">
      <li>
        <a href="{{ route('deliveries.index') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Panel de deliveries</span>
        </a>
      </li>
      <li>
        <a href="{{ route('deliveries.map') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Mapa</span>
        </a>
      </li>
    </ul>
  </li>
  <li x-data="{ showDropdown: false, }">
    <button type="button" @click="showDropdown = !showDropdown"
      class="w-full flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.box-open
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 text-left whitespace-nowrap">Inventario</span>
      <span id="angle-up" :class="showDropdown && 'rotate'">
        <x-icons.angle-up
          class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      </span>
    </button>
    <ul x-show="showDropdown" class="py-2 space-y-2" x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95">
      <li>
        <a href="{{ route('category-products.index') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Categoría
            productos</span>
        </a>
      </li>
      <li>
        <a href="{{ route('category-raw-materials.index') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Categoría
            materia prima</span>
        </a>
      </li>
      <li>
        <a href="{{ route('products.index') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Productos</span>
        </a>
      </li>
      <li>
        <a href="{{ route('raw-materials.index') }}"
          class="flex items-center py-2 pr-2 pl-6 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <span class="flex-1 whitespace-nowrap">Materia prima</span>
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a href="{{ route('promotions.index') }}"
      class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.hand-holding-dollar
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 whitespace-nowrap">{{ __('Promotions') }}</span>
    </a>
  </li>
  <li>
    <a href="{{ route('coupons.index') }}"
      class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.percent
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 whitespace-nowrap">{{ __('Coupons') }}</span>
    </a>
  </li>
  <li>
    <a href="{{ route('advertisements.index') }}"
      class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      AD
      <span class="flex-1 ml-3 whitespace-nowrap">{{ __('Advertisements') }}</span>
    </a>
  </li>
  <li>
    <a href="{{ route('audit-logs.index') }}"
      class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
      <x-icons.book
        class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
      <span class="flex-1 ml-3 whitespace-nowrap">Bitácora</span>
    </a>
  </li>
</ul>
