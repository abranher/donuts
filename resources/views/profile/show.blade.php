<x-layout title="Perfil" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <div class="bg-white text-gray-900 w-full h-full dark:bg-dark-card">
      {{-- Foto de portada --}}
      <div class="h-32 overflow-hidden border-y border-b">
        <img class="object-cover object-top w-full" src="{{ asset('img/logo.jpeg') }}" alt="Mountain">
      </div>

      {{-- Foto de perfil --}}
      <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
        <img class="object-cover object-center h-32 rounded-full"
          src="{{ asset('storage/images_profile/' . current_user()->image_profile) }}" alt="Woman looking front">
      </div>

      {{-- Datos de usuario --}}
      <div class="text-center mt-2" x-data="{
          hasToken: @js(current_user()->secret_token),
          showCard: false,
      }">
        <h2 class="font-semibold dark:text-gray-200">{{ current_user()->name }}</h2>
        <p class="text-gray-500">{{ current_user()->username }}</p>

        <template x-if="hasToken == null">
          <form action="{{ route('profile.edit') }}" method="POST">
            @csrf
            <button class="link-primary">Editar perfil</button>
          </form>
        </template>

        <template x-if="hasToken != null">

          <span>

            <a href="#" class="link-primary" @click="showCard = true">Editar perfil</a>

            <form action="{{ route('profile.edit') }}" method="POST" class="my-10 flex flex-col gap-6"
              x-show="showCard" x-data="{
                  token: {
                      char_1: '',
                      char_2: '',
                      char_3: '',
                      char_4: '',
                  },
                  get getToken() {
                      return this.token.char_1.toString() + this.token.char_2.toString() + this.token.char_3.toString() + this.token.char_4.toString()
                  },
              }">
              @csrf
              <input type="hidden" name="token" x-bind:value="getToken">

              <span class="font-medium text-gray-600">Esta acción requiere del Token secreto</span>
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

              <div class="flex items-center justify-center">
                <x-button size="md">
                  Verificar
                </x-button>
                <a class="inline-block align-baseline font-bold text-sm text-violet-500 hover:text-violet-800 ml-4"
                  href="#" @click="showCard = false">
                  Descartar
                </a>
              </div>

            </form>

          </span>

        </template>
      </div>
    </div>

    <div class="bg-white text-gray-900 w-full h-full dark:bg-dark-card" x-data="{
        openContent: 'HISTORY',
    }">
      {{-- Botones de seleccion --}}
      <section class="text-gray-700 text-center mt-3 border-b border-gray-200 grid grid-cols-3">

        <article
          class="flex py-3 flex-col items-center justify-between pb-2 pr-2 border-b-4 border-violet-600 cursor-pointer"
          @click="openContent = 'HISTORY'">
          <svg class="w-4 fill-current text-blue-900 dark:text-blue-600" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <path
              d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z">
            </path>
          </svg>
          <div class="flex justify-center items-center text-violet-600 font-bold">
            <p class="text-violet-600">Historial de Compras</p>
          </div>
        </article>

        <article class="flex py-3 flex-col items-center justify-between cursor-pointer" @click="openContent = 'RECIPE'">
          <svg class="w-4 fill-current text-blue-900 dark:text-blue-600" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <path
              d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z">
            </path>
          </svg>
          <div class="flex justify-center items-center dark:text-gray-200">
            <p>Recetas</p>
          </div>
        </article>

        <article class="flex py-3 flex-col items-center justify-between cursor-pointer"
          @click="openContent = 'COMENTS'">
          <svg class="w-4 fill-current text-blue-900 dark:text-blue-600" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <path
              d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z">
            </path>
          </svg>
          <div class="flex justify-center items-center dark:text-gray-200">
            <p>Comentarios</p>
          </div>
        </article>

      </section>

      {{-- historial de compras --}}
      <template x-if="openContent == 'HISTORY'">

        <section class="w-full p-2 flex flex-col gap-6">

          <div>

            <h2 class="font-bold m-2">HOY</h2>

            <ul class="bg-white shadow overflow-hidden rounded-md">
              <li class="shadow-md">
                <div class="px-4 py-5 sm:px-6">
                  <div class="flex items-center justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Item 1 </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 1 </p>
                  </div>
                  <div class="mt-4 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">Active </span>
                    </p>
                    <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                  </div>
                </div>
              </li>
              <li class="shadow-md">
                <div class="px-4 py-5 sm:px-6">
                  <div class="flex items-center justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Item 2 </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 2 </p>
                  </div>
                  <div class="mt-4 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500">Status: <span class="text-red-600">Inactive </span>
                    </p>
                    <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                  </div>
                </div>
              </li>
              <li class="shadow-md">
                <div class="px-4 py-5 sm:px-6">
                  <div class="flex items-center justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Item 3 </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 3 </p>
                  </div>
                  <div class="mt-4 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500">Status: <span class="text-yellow-600">Pending
                      </span>
                    </p>
                    <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                  </div>
                </div>
              </li>
            </ul>

          </div>

          <div>

            <h2 class="font-bold m-2">AYER</h2>

            <ul class="bg-white shadow overflow-hidden rounded-md">
              <li class="shadow-md">
                <div class="px-4 py-5 sm:px-6">
                  <div class="flex items-center justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Item 1 </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 1 </p>
                  </div>
                  <div class="mt-4 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">Active </span>
                    </p>
                    <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                  </div>
                </div>
              </li>
            </ul>

          </div>

        </section>

      </template>

      {{-- historial de recetas --}}
      <template x-if="openContent == 'RECIPE'">

        <section class="w-full p-2 flex flex-col gap-6">

          <ul class="bg-white shadow overflow-hidden sm:rounded-md">
            <li class="shadow-md">
              <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg leading-6 font-medium text-gray-900">Item 1 </h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 1 </p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">Active </span>
                  </p>
                  <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                </div>
              </div>
            </li>
            <li class="border-t border-gray-200">
              <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg leading-6 font-medium text-gray-900">Item 2 </h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 2 </p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-500">Status: <span class="text-red-600">Inactive </span>
                  </p>
                  <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                </div>
              </div>
            </li>
            <li class="border-t border-gray-200">
              <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg leading-6 font-medium text-gray-900">Item 3 </h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500">Description for Item 3 </p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-500">Status: <span class="text-yellow-600">Pending </span>
                  </p>
                  <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                </div>
              </div>
            </li>
          </ul>

        </section>

      </template>

      {{-- Comentarios --}}
      <template x-if="openContent == 'COMENTS'">

        <section class="w-full p-2 flex flex-col gap-6">

          <div class="flex items-start border-b border-gray-200 rounded-md shadow-md">
            <div class="flex-shrink-0">
              <div class="inline-block relative">
                <div class="relative w-16 h-16 rounded-full overflow-hidden">
                  <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover"
                    src="../../../fastly.picsum.photos/id/646/200/646-200x200.jpg" alt="Profile picture">
                  <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                </div>
                <svg
                  class="fill-current text-white bg-green-600 rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1"
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path
                    d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10 5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z">
                  </path>
                </svg>
              </div>
            </div>
            <div class="ml-6">
              <p class="flex items-baseline">
                <span class="text-gray-600 font-bold">Mary T. </span>
                <span class="ml-2 text-green-600 text-xs">Verified Buyer </span>
              </p>
              <div class="flex items-center mt-1">
                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20">
                  <path
                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                  </path>
                </svg>
                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20">
                  <path
                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                  </path>
                </svg>
                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20">
                  <path
                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                  </path>
                </svg>
                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20">
                  <path
                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                  </path>
                </svg>
                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20">
                  <path
                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                  </path>
                </svg>
              </div>
              <div class="flex items-center mt-4 text-gray-600">
                <div class="flex items-center">
                  <span class="text-sm">Product Quality </span>
                  <div class="flex items-center ml-2">
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                  </div>
                </div>
                <div class="flex items-center ml-4">
                  <span class="text-sm">Purchasing Experience </span>
                  <div class="flex items-center ml-2">
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                    <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                      </path>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="mt-3">
                <span class="font-bold">Sapien consequat eleifend! </span>
                <p class="mt-1">Lorem ipsum dolor sit ____, consectetur adipisicing elit, sed __ eiusmod tempor
                  incididunt ut ______ et dolore magna aliqua. __ enim ad minim veniam, ____ nostrud exercitation
                  ullamco
                  laboris ____ ut aliquip ex ea _______ consequat. Duis aute irure _____ in reprehenderit in voluptate
                  _____
                  esse cillum dolore eu ______ nulla pariatur. </p>
              </div>
              <div class="flex items-center justify-between mt-4 text-sm text-gray-600 fill-current">
                <button class="flex items-center">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                      d="M5.08 12.16A2.99 2.99 0 0 1 0 10a3 3 0 0 1 5.08-2.16l8.94-4.47a3 3 0 1 1 .9 1.79L5.98 9.63a3.03 3.03 0 0 1 0 .74l8.94 4.47A2.99 2.99 0 0 1 20 17a3 3 0 1 1-5.98-.37l-8.94-4.47z">
                    </path>
                  </svg>
                  <span class="ml-2">Share </span>
                </button>
                <div class="flex items-center">
                  <span>Was this review helplful? </span>
                  <button class="flex items-center ml-6">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path
                        d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z">
                      </path>
                    </svg>
                    <span class="ml-2">56 </span>
                  </button>
                  <button class="flex items-center ml-4">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path
                        d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z">
                      </path>
                    </svg>
                    <span class="ml-2">10 </span>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </section>

      </template>

    </div>
  </x-main.user>

</x-layout>
