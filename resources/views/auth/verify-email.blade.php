@php
  $registered = session('status') === 'Usuario creado exitosamente!';
@endphp

<x-layout :title="__('Verify Email Address')" :vite="['js/flowbite.min.js']">

  <a href="{{ route('login') }}"
    class="absolute top-5 left-5 cursor-pointer inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <svg class="w-7 h-7 text-gray-700 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
      fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
      <path
        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
    </svg>
  </a>

  <x-auth>

    <x-auth_message_errors />
    <x-auth_message_status />

    <x-card title="{{ __('Regards!') }}">

      <x-auth_form :action="route('verification.send')">

        <x-auth_form.subtitle :value="$registered
            ? __(
                'We have sent you an email with a link to verify your account. To complete the verification, click on the link and follow the instructions.',
            )
            : 'Tu correo electrónico no está verificado. Para continuar, haz click en el botón y te enviaremos un enlace a tu correo para verificar tu cuenta.'" />
        @if ($registered)
          <div>
            <p class="text-lg font-medium">{{ __('You did not receive the email?') }}</p>
          </div>
        @endif
        <div>
          @if ($registered)
            <button type="submit" class="link-primary">
              {{ __('click here to request another') }}
            </button>
          @else
            <button type="submit" class="btn-primary">
              {{ __('Send') }}
            </button>
          @endif
        </div>
      </x-auth_form>

    </x-card>

  </x-auth>

</x-layout>
