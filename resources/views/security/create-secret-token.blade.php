<x-layout title="Clave secreta" :vite="['js/flowbite.min.js']">

  <a href="{{ route('home') }}"
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

    <x-card title="Token Secreto">

      <x-auth_form :action="route('secret_token.store')" class="px-4 py-1">
        <x-auth_form.subtitle
          value="Para poder realizar operaciones especiales como actualizar datos de tu cuenta, es necesario que crees un token
      secreto." />

        <div class="my-10 flex flex-col gap-6" x-data="{
            form: 'first',
            token: {
                char_1: '',
                char_2: '',
                char_3: '',
                char_4: '',
            },
            token_confirmation: {
                char_5: '',
                char_6: '',
                char_7: '',
                char_8: '',
            },
            get getToken() {
                return this.token.char_1.toString() + this.token.char_2.toString() + this.token.char_3.toString() + this.token.char_4.toString()
            },
            get getToken_confirmation() {
                return this.token_confirmation.char_5.toString() + this.token_confirmation.char_6.toString() + this.token_confirmation.char_7.toString() + this.token_confirmation.char_8.toString()
            },
            atras: function() {
                this.form = 'first'
                this.token_confirmation = {
                    char_5: '',
                    char_6: '',
                    char_7: '',
                    char_8: '',
                }
            },
            siguiente: function() {
                if (this.token.char_1 != '' && this.token.char_2 != '' && this.token.char_3 != '' && this.token.char_4 != '') {
                    this.form = 'second'
                }
        
                return
            }
        }">

          <input type="hidden" name="token" x-bind:value="getToken">
          <input type="hidden" name="token_confirmation" x-bind:value="getToken_confirmation">

          <template x-if="form == 'first'">

            <div class="flex justify-center gap-2">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token.char_1 = $event.target.value">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token.char_2 = $event.target.value">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token.char_3 = $event.target.value">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token.char_4 = $event.target.value">
            </div>

          </template>

          <template x-if="form == 'second'">

            <div class="flex justify-center gap-2">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token_confirmation.char_5 = $event.target.value">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token_confirmation.char_6 = $event.target.value">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token_confirmation.char_7 = $event.target.value">
              <input
                class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                required="" @keyup="token_confirmation.char_8 = $event.target.value">
            </div>

          </template>

          <template x-if="form == 'first'">

            <div class="flex items-center justify-center">
              <x-button type="button" size="md" @click="siguiente">
                Siguiente
              </x-button>
              <a class="inline-block align-baseline font-bold text-sm text-violet-500 hover:text-violet-800 ml-4"
                href="{{ route('profile.show') }}">
                Descartar
              </a>
            </div>

          </template>

          <template x-if="form == 'second'">
            <div class="flex items-center justify-center">
              <x-button size="md">
                Crear
              </x-button>
              <button class="inline-block align-baseline font-bold text-sm text-violet-500 hover:text-violet-800 ml-4"
                @click="atras">
                Atrás
              </button>
            </div>
          </template>

          <p class="dark:text-gray-300 font-medium text-gray-600">
            Todos los campos son obligatorios (*)
          </p>

        </div>

      </x-auth_form>

    </x-card>

  </x-auth>

</x-layout>
