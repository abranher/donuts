<x-layout :title="__('Enter Key')" :vite="['js/flowbite.min.js', 'js/auth/enter-key/enter-key.js']" react>

  <x-btn-back />

  <x-auth>
    <x-auth_message_errors />
    <x-auth_message_status />

    <x-card title="{{ __('Enter dynamic key') }}">
      <section id="main"></section>
    </x-card>
  </x-auth>

</x-layout>
