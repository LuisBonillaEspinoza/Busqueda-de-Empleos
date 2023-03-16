@props(['url'])
<tr>
<td class="header">
<a style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1 class="text-4xl text-white">
    Dev<span class="font-extrabold">Jobs</span>
</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
