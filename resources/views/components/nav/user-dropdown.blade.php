{{-- avatar --}}
<x-dropdown align="right" width="60">
  <x-slot name="trigger">
    <div class="relative">
      <img type="button" class="w-10 h-10 rounded-full cursor-pointer object-cover object-center"
        src="{{ asset('storage/images_profile/' . current_user()->image_profile) }}" alt="User dropdown">
      <span
        class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
    </div>
  </x-slot>
  <x-slot name="content">
    {{-- dropdown del avatar --}}
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
      <div class="font-medium text-base truncate">{{ current_user()->name }}</div>
      <div class="font-medium truncate">{{ current_user()->email }}</div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
      <li>
        <a href="{{ route('profile.show') }}"
          class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <x-icons.user
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
          <span class="ml-3">{{ current_user()->username }}</span>
        </a>
      </li>
      <li>
        <a href="#" id="buttonTheme"
          class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group">
          <x-icons.moon
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
          <span class="ml-3">Modo oscuro</span>
        </a>
      </li>
    </ul>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
      <li>
        <x-button_logout />
      </li>
    </ul>
  </x-slot>
</x-dropdown>
