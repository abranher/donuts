@props([
    'cols' => [],
    'content',
    'title' => 'Título',
    'create' => '#',
    'buttonName' => 'buttonName',
    'linkTo' => '#',
    'linkName' => 'linkName',
    'links',
    'report' => false,
    'routeReport' => '#',
    'routeDownload' => '#',
])

<section class="w-full flex justify-center items-center" id="data-table">
  <div class="w-11/12">
    <div class="bg-white dark:bg-dark-card shadow-lg p-3">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <x-table.title>
          {{ $title }}
        </x-table.title>
        @if ($report)
          <div class="w-full flex justify-end">
            <div class="flex gap-2">
              <x-button color="right" href="{{ $routeReport }}">
                <x-icons.file-pdf />
                Reporte
              </x-button>
              <x-button color="right" href="{{ $routeDownload }}">
                <x-icons.download />
              </x-button>
            </div>
          </div>
        @endif
      </div>
      @if ($linkTo !== '#')
        <div
          class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <div>
            <a href="{{ $linkTo }}" class="link-primary">
              {{ $linkName }}
            </a>
          </div>
        </div>
      @endif
      <div
        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
        <div class="w-full md:w-1/2">
          <form class="flex items-center">
            <label for="simple-search" class="sr-only">
              Buscar
            </label>
            <div class="relative w-full">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fillRule="evenodd" clipRule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                </svg>
              </div>
              <input type="text" id="simple-search" placeholder="Buscar..."
                class="bg-gray-50 border border-gray-300 focus:border-gray-400 dark:focus:border-gray-700 text-gray-900 text-sm rounded-lg focus:outline-none block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
          </form>
        </div>
        @if ($create != '#')
          <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{ $create }}" class="w-full">
              <button type="button" id="createProductButton"
                class="w-full flex items-center justify-center text-white bg-violet-600 font-medium rounded-lg text-sm px-4 py-2 dark:hover:bg-violet-600 focus:outline-none active:bg-violet-800">
                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clipRule="evenodd" fillRule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                {{ $buttonName }}
              </button>
            </a>
          </div>
        @endif
      </div>

      {{-- tabla de datos --}}
      <div class="flex flex-col my-6">
        <div class="overflow-x-auto rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 text-center dark:divide-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr class="text-center">
                    <th class="p-4">N°</th>
                    @foreach ($cols as $col)
                      <th class="p-4">{{ $col }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @if ($content->toHtml() === '')
                    <tr>
                      <td colspan="{{ count($cols) + 1 }}" class="font-bold p-4 dark:text-gray-200">
                        <p class="mb-2">Aún no hay datos</p>
                      </td>
                    </tr>
                  @else
                    {{ $content }}
                  @endempty
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="m-5">
      {{ $links }}
    </div>

  </div>
</div>
</section>
