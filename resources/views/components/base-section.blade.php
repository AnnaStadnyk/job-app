@props(['header'])
<section {{ $attributes->merge(["class" => "space-y-6"])}}>

    <x-base-header>{{ $header }}</x-base-header>

    {{ $slot }}
</section>