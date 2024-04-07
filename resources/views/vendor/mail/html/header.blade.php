@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Donuts Maker')
<img src="{{ asset('img/logo.jpeg') }}" class="logo" alt="Donuts Maker Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
