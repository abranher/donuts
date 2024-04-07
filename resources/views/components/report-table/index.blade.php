@props([
    'cols' => [],
    'content',
    'total' => 0,
])

<table class="w-full text-center">
  <thead class="w-full text-xs text-gray-800 uppercase bg-violet-400">
    <tr class="w-full text-center">
      @foreach ($cols as $col)
        <th class="p-2 whitespace-nowrap border-b">{{ $col }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @if ($content->toHtml() === '')
      <tr>
        <td colspan="{{ count($cols) + 1 }}" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
          <p class="mb-2">No hay datos</p>
        </td>
      </tr>
    @else
      {{ $content }}
    @endempty
</tbody>
</table>

<section class="p-2 text-lg">
<p>Total: {{ $total->count() }}</p>
</section>
