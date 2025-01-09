@props(['name', 'label' => false])

@if($label)
<label for="{{ $name }}" {{ $attributes->merge(['class' => 'block text-sm/6 text-gray-900']) }}>{{ $label }}</label>
@endif