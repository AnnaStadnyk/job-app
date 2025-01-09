@props(['name', 'label', 'value'])

<div class="flex items-center gap-x-3">
    <input id="{{ $name.'_'.$value }}" name="{{ $name }}" value="{{ $value }}" type="radio" class="relative size-4 appearance-none rounded-full border @if ($errors->get($name)) border-red-500 @else border-gray-300 @endif bg-white before:absolute before:inset-[1px] before:rounded-full before:bg-white checked:border-blue-600 checked:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">

    <x-form.label :name="$name.'_'.$value" :label="$label" />
</div>