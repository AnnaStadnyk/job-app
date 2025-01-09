@props(['item' => 'link'])

@if ($item === 'link')
<a {{ $attributes }} class="block rounded-md bg-blue-600 px-2.5 py-1.5 font-medium text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors duration-300">{{ $slot }}</a>
@else
<button {{ $attributes->merge(["class" => "block rounded-md bg-blue-600 px-2.5 py-1.5 font-medium text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors duration-300"]) }}>{{ $slot }}</button>
@endif