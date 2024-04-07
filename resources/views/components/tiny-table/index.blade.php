@props([
    'cols' => [],
    'content',
])

<div class="flex flex-col my-6 w-full">
  <div class="overflow-x-auto rounded-lg">
    <div class="inline-block min-w-full align-middle">
      <div class="overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-center dark:divide-gray-600">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
              @foreach ($cols as $col)
                <th class="p-4 whitespace-nowrap bg-violet-400 text-gray-900 text-base">{{ $col }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @if ($content->toHtml() === '')
              <tr>
                <td colspan="{{ count($cols) + 1 }}" class="font-bold p-4 dark:text-gray-200">
                  <p class="mb-2">No hay datos</p>
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
