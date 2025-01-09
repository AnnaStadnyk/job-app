@props(['active' => false, 'item' => 'link'])

@php
$classes = 'rounded-md px-3 py-1.5 font-medium text-gray-300';
if($active === false) {
$classes .= ' hover:bg-gray-700 hover:text-white transition-colors duration-300';
}
else
$classes .= ' bg-gray-900 text-white';
@endphp

@if ($item === 'link')
<a {{ $attributes->merge(['class' => $classes]) }} aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
@else
<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif