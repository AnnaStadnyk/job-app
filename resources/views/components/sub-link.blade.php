@props(['kind' => 'link'])

@if ($kind === 'link')
<a {{ $attributes }} class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500 transition-colors duration-300">{{ $slot }}</a>
@else
<button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:text-blue-500 outline-none transition-colors duration-300">{{ $slot }}</button>
@endif