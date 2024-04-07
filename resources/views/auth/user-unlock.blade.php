<x-layout :title="__('User unlock')" :vite="['js/flowbite.min.js', 'js/auth/user-unlock/user-unlock.js']" react>

  <x-btn-back-login />

  <x-auth>
    <x-auth_message_errors />
    <x-auth_message_status />

    <x-card title="{{ __('User blocked!') }}">
      <section id="main"></section>
    </x-card>
  </x-auth>

</x-layout>
