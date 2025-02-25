@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active '
            : 'nav-link active ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
