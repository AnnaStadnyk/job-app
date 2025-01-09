@props(['name', 'label' => false])

@php
$defaults = [
'type' => 'text',
'name' => $name,
'id' => $name
];
@endphp

<x-form.group :name="$name" :label="$label">
  <input {{ $attributes($defaults) }} class=" px-3 py-1.5 block w-full rounded-md bg-white text-gray-900 outline outline-1 -outline-offset-1 @if ($errors->get($name)) outline-red-500 @else outline-gray-300 @endif placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600">
</x-form.group>