<x-layout title="Perfil" :vite="['js/flowbite.min.js', 'js/editImage.js']" react notifications>

  <x-main.user>
    <div class="bg-white text-gray-900 w-full h-full">
      <div class="h-32 overflow-hidden border border-b">
        <img class="object-cover object-top w-full" src="{{ asset('img/logo.jpeg') }}" alt="Mountain">
      </div>

      <form action="{{ route('profile.changeImage') }}" method="POST" encType="multipart/form-data">
        @csrf
        <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full">
          <img id="ElementIMG" class="object-cover object-center h-32 rounded-full"
            src="{{ asset('storage/images_profile/' . current_user()->image_profile) }}" alt="Woman looking front">
          <span
            class="bottom-0 right-1 z-40 absolute overflow-hidden w-10 h-10 bg-violet-600 border-2 border-white dark:border-gray-800 rounded-full flex justify-center items-center">
            <input id="inputFile" type="file" name="image_profile"
              class="absolute scale-[3] opacity-0 cursor-pointer">
            <x-icons.camera />
          </span>
        </div>
        <div id="ElementBtn" class="w-full justify-center items-center mt-5 hidden">
          <x-button size="md">
            Guardar
          </x-button>
        </div>
      </form>

      <div class="text-center mt-2">
        <h2 class="font-semibold">{{ current_user()->name }}</h2>
        <p class="text-gray-500">{{ current_user()->username }}</p>
      </div>
      <div class="p-4 border-t mx-8 mt-2 flex flex-col gap-20">
        {{-- info perfil --}}
        <section class="w-full">
          <div id="main" class="relative w-full h-auto max-h-full m-auto">
            <form action="http://localhost:8000/admin/delivery_man" method="POST"
              class="relative p-4 bg-white rounded-lg shadow-lg dark:bg-dark-card sm:p-5">
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-2xl font-bold text-slate-500 dark:text-white">Actualizar información de perfil</h3>
              </div>
              <section>
                <div class="grid gap-4 mb-4 lg:grid-cols-2">
                  <input type="hidden" name="_token" value="c9Iw6NAbTJ868mcyCfjXu0Lu7WU5BeMNyZVU3zkB">
                  <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                      *</label>
                    <input type="text" id="nombre"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                      placeholder="Nombre" name="nombre">
                  </div>
                  <div>
                    <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                      *</label>
                    <input type="text" id="apellido"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                      placeholder="Flores" name="apellido">
                  </div>
                  <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                      electrónico
                      *</label>
                    <input type="text" id="email"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                      placeholder="ejemplo@ejemplo.com" name="email">
                  </div>
                  <div><label for="nombre_usuario"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de usuario
                      *</label>
                    <input type="text" id="nombre_usuario"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                      placeholder="carlosF90" name="nombre_usuario">
                  </div>
                  <div><label for="cedula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cédula
                      *</label>
                    <div class="flex justify-center items-center gap-2"><select type="text" id="tipo_documento"
                        class="w-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                        placeholder="carlosF90" name="tipo_documento">
                        <option value="V">V</option>
                        <option value="J">J</option>
                        <option value="E">E</option>
                      </select><input type="text" id="cedula"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                        placeholder="31081346" name="cedula"></div>
                  </div>
                  <div><label for="telefono"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Télefono *</label><input
                      type="number" id="telefono"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                      placeholder="04125636987" name="telefono"></div>
                  <div><label for="fecha_nacimiento"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Nacimiento
                      *</label><input type="date" id="fecha_nacimiento"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                      name="fecha_nacimiento"></div>
                </div>
                <div class="my-5">
                  <p class="dark:text-gray-300 font-medium">Todos los campos son obligatorios (*)</p>
                </div>
                <div class="items-center justify-end space-y-4 sm:flex sm:space-y-0 sm:space-x-4"><a
                    href="http://localhost:8000/admin/delivery_man"><button type="button"
                      class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"><svg
                        class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                      </svg>Descartar</button></a><button type="submit"
                    class="w-full sm:w-auto justify-center text-white inline-flex bg-violet-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-violet-600 active:bg-violet-800">Añadir</button>
                </div>
              </section>
            </form>
          </div>
        </section>

        {{-- Contraseña perfil --}}
        <section class="w-full">
          <div id="main" class="relative w-full h-auto max-h-full m-auto">
            <form action="http://localhost:8000/admin/delivery_man" method="POST"
              class="relative p-4 bg-white rounded-lg shadow-lg dark:bg-dark-card sm:p-5">
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-2xl font-bold text-slate-500 dark:text-white">Actualizar contraseña</h3>
              </div>
              <section>
                <div class="grid gap-4 mb-4 lg:grid-cols-2">
                  <input type="hidden" name="_token" value="c9Iw6NAbTJ868mcyCfjXu0Lu7WU5BeMNyZVU3zkB">
                  <div>
                    <label for="password"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña *</label>
                    <input type="text" id="password"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                      placeholder="" name="password">
                  </div>
                  <div>
                    <label for="password_confirmation"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirme contraseña
                      *</label>
                    <input type="text" name="password_confirmation" id="password_confirmation"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                      placeholder="">
                  </div>
                  <div class="my-5">
                    <p class="dark:text-gray-300 font-medium">Todos los campos son obligatorios (*)</p>
                  </div>
                  <div class="items-center justify-end space-y-4 sm:flex sm:space-y-0 sm:space-x-4"><a
                      href="http://localhost:8000/admin/delivery_man"><button type="button"
                        class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"><svg
                          class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>Descartar</button></a><button type="submit"
                      class="w-full sm:w-auto justify-center text-white inline-flex bg-violet-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-violet-600 active:bg-violet-800">Añadir</button>
                  </div>
              </section>
            </form>
          </div>
        </section>
      </div>
    </div>
  </x-main.user>

</x-layout>
