@props(['article' => false, 'form' => false])

@if ($article)
<article {{ $attributes->merge(["class" => "bg-white p-4 sm:p-6 rounded-md border border-gray-100 hover:border-blue-500 transition-colors duration-300 group"]) }}>
  {{ $slot }}
</article>
@endif

@if ($form)
<div {{ $attributes->merge(["class" => "bg-white px-6 py-12 lg:px-8 rounded-md border border-gray-100"]) }}>
  {{ $slot }}
</div>
@endif