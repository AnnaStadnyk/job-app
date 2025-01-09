@props(['name'])

@error($name)
<span class="mt-1 text-sm/6 text-red-500 font-medium">{{ $message }}</p>
    @enderror