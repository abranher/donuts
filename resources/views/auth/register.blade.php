<x-layout title="Registro" :vite="['js/flowbite.min.js', 'js/auth/sign-up/sign-up.js']" react>

  <x-btn-back />

  <x-auth>
    <x-auth_message_errors />
    <x-auth_message_status />

    <x-card size="max-w-4xl max-lg:max-w-2xl max-md:max-w-md max-md:m-8" title="{{ __('Create account') }}">
      <section id="main"></section>
    </x-card>
  </x-auth>

  <script>
    const typeIdentificationCard = @json($typeIdentificationCard);
    const phoneCodes = @json($phoneCodes);
    const states = @json($states);
    const municipalities = @json($municipalities);
  </script>
</x-layout>
