@props(['active'])

@php
$classes = ($active ?? false)
            ? 'btn btn-primary'
            : 'btn btn-primary active';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>


