<x-layout title="Recetas - Personalizar" :vite="['js/flowbite.min.js', 'js/custom/custom-image.js']" react notifications>

  <x-main.user>
    <x-title title="Crear Receta" />

    <section class="w-11/12 h-full flex flex-col justify-center items-center bg-white dark:bg-dark">
      <div
        class="overflow-hidden w-full md:w-[480px] h-80 md:h-96 bg-blue-300 border border-gray-200 dark:border-gray-400 rounded-lg shadow-sm relative">
        <div class="container-images absolute inset-x-0 -top-32 -bottom-32">
          <img src="../models/donut-main.png" id="image-donut" class="donuts-image" />
          <img id="image-glazed" class="donuts-image" />
          <img id="image-topping" class="donuts-image" />
        </div>
      </div>

      {{-- controles --}}
      <div class="w-full flex-grow h-2/3 flex flex-col gap-8 mb-10">
        <form action="{{ route('recipes.store') }}" method="POST"
          class="py-7 bg-white dark:bg-dark-card rounded-lg shadow-sm flex flex-col gap-8">
          @csrf
          <div class="w-full flex justify-center items-center gap-2">
            <button id="btnGlazed" type="button"
              class="h-10 px-6 font-semibold rounded-full border border-slate-400 text-slate-900 dark:text-slate-200">Glaseados</button>
            <button id="btnTopping" type="button"
              class="h-10 px-6 font-semibold rounded-full border border-slate-400 text-slate-900 dark:text-slate-200">Toppings</button>
          </div>

          <div class="flex flex-col">
            <div class="overflow-x-auto rounded-lg">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden sm:rounded-lg">
                  <div class="w-full flex justify-center items-center gap-3" id="buttonsContainer"></div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <x-table.title>Datos de la Receta</x-table.title>
            <div class="grid grid-cols-1 gap-2">
              <input type="hidden" name="raw_material_id" value="0">
              <div class="flex flex-col items-start">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                  *</label>
                <input
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                  type="text" id="name" name="name" placeholder="Mi dona favorita">
              </div>
              <div class="flex flex-col items-start">
                <label for="description"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                  (Opcional)</label>
                <textarea
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none"
                  rows="4" id="description" name="description" placeholder="Mi dona favorita con glaseado de fresa"></textarea>
              </div>
            </div>
          </div>

          <div class="w-full text-lg" id="recipe">
            <p>Glaseado: </p>
            <p>Topping: </p>
            <p>Total: </p>
          </div>

          <div>
            <input type="hidden" name="glazed" id="glazed">
            <input type="hidden" name="topping" id="topping">
            <div class="w-full flex justify-end">
              <x-button size="lg" id="hecho">GUARDAR</x-button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </x-main.user>

  <script>
    const rawMaterials = @json($raw_materials)
  </script>
</x-layout>
