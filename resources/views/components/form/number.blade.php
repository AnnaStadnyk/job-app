@props(['iName', 'sName', 'iLabel' => false, 'sLabel' => false, 'iValue', 'sValue', 'values'])

<x-form.group :name="$iName" :label="$iLabel">

    <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 @if ($errors->get($iName, $sName)) outline-red-500 @else outline-gray-300 @endif has-[input:focus-within]:outline has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-blue-600">
        <div class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">$</div>

        <input type="number" name="{{ $iName }}" id="{{ $iName }}" value="{{ $iValue }}" step="0.01" class="no-spinner block min-w-0 grow py-1.5 pl-1 pr-3 text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0" placeholder="0.00">

        <div class="grid shrink-0 grid-cols-1 focus-within:relative">
            <select id="{{ $sName }}" name="{{ $sName }}" aria-label="{{ $sLabel }}" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pl-3 pr-7 text-gray-500 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600">
                @foreach($values as $opt)
                <option value="{{ $opt->id }}" @selected($opt->id===$sValue) class="text-gray-900">{{ $opt->title }}</option>
                @endforeach
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>

</x-form.group>