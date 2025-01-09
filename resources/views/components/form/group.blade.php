@props(['name', 'label' => false])

<div>
    <x-form.label :name="$name" :label="$label" class="font-medium" />

    <div @if ($label) {{ "class=mt-2" }} @endif>
        {{ $slot }}

        <x-form.error :name="$name" />
    </div>
</div>