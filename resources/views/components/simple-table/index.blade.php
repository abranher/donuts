@props([
    'cols' => [],
    'content',
    'title' => 'Título',
    'links',
    'create' => '#',
    'extra' => '',
])

<section class="w-full flex justify-center items-center">
  <div class="w-11/12">
    <div class="bg-white dark:bg-dark-card shadow-lg p-3">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <x-table.title>
          {{ $title }}
        </x-table.title>
      </div>
      <div class="flex flex-col items-start text-xl mx-4 py-4 border-t dark:border-gray-700">
        {{ $extra }}
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
