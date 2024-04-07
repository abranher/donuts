<x-layout title="Usuarios" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Listado de Usuarios" />

    <x-table :cols="[__('Name'), __('Username'), __('E-Mail Address'), __('Role'), 'ACCIONES']">
      <x-slot name="title">
        Listado de Usuarios
      </x-slot>
      <x-slot name="content">
        @foreach ($users as $user)
          <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-table.td>
              {{ $user->id }}
            </x-table.td>

            <x-table.td>
              {{ $user->name }}
            </x-table.td>

            <x-table.td>
              {{ $user->username }}
            </x-table.td>

            <x-table.td>
              {{ $user->email }}
            </x-table.td>

            <x-table.td>
              {{ $roles[$user->roles[0]->name] }}
            </x-table.td>

            <x-table.td>
              <div class="flex items-center space-x-4">
                <a href="{{ route('users.show', $user->id) }}">
                  <x-button type="button" color="light">
                    <x-icons.eye />
                    Ver
                  </x-button>
                </a>
              </div>
            </x-table.td>
          </tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $users->links() }}
      </x-slot>
    </x-table>
  </x-main.admin>

</x-layout>
