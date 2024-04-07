<x-layout title="Recetas" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.user>
    <x-title title="Mis Recetas" />

    <section class="w-full my-10 px-3" x-data="{
        recipes: @js($recipes),
        init() {
            console.log(this.recipes);
        },
    }">

      <article class="w-full flex flex-col gap-2 shadow overflow-hidden rounded-md">

        <template x-for="recipe in recipes">

          <div>
            <h2 class="font-bold m-2" x-text="recipe.created">HOY</h2>

            <div class="border border-gray-300 dark:border-gray-600 dark:bg-dark-card rounded-md w-full">
              <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-300" x-text="recipe.name">
                  </h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300" x-text="recipe.description"></p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">Disponible</span>
                  </p>
                  <a href="javascript:void(0)" class="font-medium text-violet-600 hover:text-violet-500">Edit </a>
                </div>
              </div>
            </div>

          </div>
        </template>

      </article>

      <template x-if="recipes.length == 0">

        <div class="px-2 py-5 w-full flex justify-center">
          <div class="bg-white dark:bg-dark-card lg:mx-8 h-4/5 xl:flex xl:max-w-5xl xl:shadow-lg rounded-lg">
            <div class="xl:w-1/2">
              <div class="xl:scale-105 h-80 bg-cover xl:h-full rounded-b-none border dark:text-gray-600 xl:rounded-lg"
                style="background-image:url('img/Donacentral.jpg')">
              </div>
            </div>
            <div
              class="py-12 px-6 xl:px-12 max-w-xl xl:max-w-5xl xl:w-1/2 border-gray-300 dark:border-gray-600 rounded-t-none border lg:rounded-lg">
              <h2 class="text-3xl text-gray-800 dark:text-gray-200 font-bold">
                Aún no tienes <span class="text-indigo-600">Recetas </span> registradas
              </h2>
              <p class="mt-4 text-gray-600 dark:text-gray-300 text-4xl">
                Podrás crear tus Donas personalizadas, pedirlas por delivery y disfrutar a tu gusto.
              </p>
              <p class="text-xl text-gray-600 dark:text-gray-200 font-medium my-5">¿Estás listo?</p>
              <div>
                <x-button href="{{ route('recipes.create') }}">Empezar ahora
                </x-button>
              </div>
            </div>
          </div>
        </div>

      </template>

    </section>
  </x-main.user>

</x-layout>
