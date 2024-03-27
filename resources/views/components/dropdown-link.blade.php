@props(['active' => false])
@php
    $classes = 'px-2 py-1 block hover:bg-blue-200 focus:bg-blue-200';
    $classes .= $active ? ' bg-blue-200' : '';
@endphp
<a {{ $attributes(['class' => $classes]) }}>{{ $slot }}
</a>
