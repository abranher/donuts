<x-layout title="Usuarios" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Listado de Usuarios" />

    {{-- tabla de datos --}}
    <section class="w-full flex justify-center items-center" id="data-table">
      <div
        class="border border-gray-200 dark:bg-dark-card dark:border-gray-600 rounded-md p-8 w-11/12 font-medium text-lg">
        <div class="flex flex-col gap-6">
          <div class="mx-auto w-32 h-32 relative -mt-16 border-2 border-gray-300 rounded-full">
            <img id="ElementIMG" class="object-cover object-center h-32 rounded-full" src="{{ $user->picture_url_user }}"
              alt="{{ $user->username }}">
          </div>

          <div class="text-center mt-2">
            <p class="text-gray-500">{{ $user->username }}</p>
            <p class="text-gray-500">{{ $user->email }}</p>
          </div>

          <div>
            <x-table.title>
              Datos Personales
            </x-table.title>
            <div class="grid lg:grid-cols-2 gap-3">
              <div>
                <h2 class="font-bold dark:text-gray-300">Nombre: </h2>
                <p>{{ $user->name }}</p>
              </div>
              <div>
                <h2 class="font-bold dark:text-gray-300">Fecha de nacimiento: </h2>
                <p>{{ $user->birth }}</p>
              </div>
              <div>
                <h2 class="font-bold dark:text-gray-300">Documento de Identidad: </h2>
                <p>{{ $user->identificationCard->type . ' - ' . $user->identificationCard->identification_number }}
                </p>
              </div>
              <div>
                <h2 class="font-bold dark:text-gray-300">Número de Télefono: </h2>
                <p>{{ $user->phone->code_phone . '-' . $user->phone->phone_number }}</p>
              </div>
              <div>
                <h2 class="font-bold dark:text-gray-300">Dirección: </h2>
              </div>
              <div></div>
              <div>
                <h3 class="font-bold dark:text-gray-300">Estado: </h3>
                <p>{{ $user->address->state->name }}</p>
              </div>
              <div>
                <h3 class="font-bold dark:text-gray-300">Municipio: </h3>
                <p>{{ $user->address->municipality->name }}</p>
              </div>
              <div>
                <h3 class="font-bold dark:text-gray-300">Dirección exacta: </h3>
                <p>{{ $user->address->address }}</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
  </x-main.admin>

</x-layout>
