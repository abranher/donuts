<x-layout title="Bitácora" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Bitácora" />

    <x-simple-table :cols="[__('User'), __('User Level'), __('Action'), __('Hour')]" withinAdd>
      <x-slot name="title">
        Listado de {{ __('Orders') }}
      </x-slot>
      <x-slot name="extra">
        <span></span>
      </x-slot>
      <x-slot name="content">
        @foreach ($audit_logs as $audit_log)
          <x-table.tr>
            <x-table.td>
              {{ $audit_log->id }}
            </x-table.td>

            <x-table.td>
              {{ $audit_log->user->name . ' - ' . $audit_log->user->username }}
            </x-table.td>

            <x-table.td>
              {{ $audit_log->user->roles[0]->name }}
            </x-table.td>

            <x-table.td>
              {{ $audit_log->action }}
            </x-table.td>


            <x-table.td>
              {{ $audit_log->created_at }}
            </x-table.td>
          </x-table.tr>
        @endforeach
      </x-slot>
      <x-slot name="links">
        {{ $audit_logs->links() }}
      </x-slot>
    </x-simple-table>
  </x-main.admin>

</x-layout>
