<form action="{{ route('logout', current_user()->id) }}" method="POST">
  @csrf
  <button type="submit"
    class="flex items-center p-2 text-gray-500 dark:text-gray-50 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-opacity-5 group w-full">
    <x-icons.logout
      class="flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600" />
    <span class="ml-3 ">Salir</span>
  </button>
</form>
