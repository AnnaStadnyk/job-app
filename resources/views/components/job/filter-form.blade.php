@props(['dictionaries'])

<form action="{{ route('filter') }}" class="space-y-6">
    <div class="grid gap-4 lg:gap-12 grid-cols-[repeat(2,1fr)_auto] md:grid-cols-[repeat(3,1fr)_auto]">

        <x-form.fieldset>
            <x-slot:name>Types</x-slot:name>

            @foreach($dictionaries['type'] as $type)
            <x-form.radio name="type" :value="$type->id" :label="ucwords($type->title)" />
            @endforeach
        </x-form.fieldset>

        <x-form.fieldset>
            <x-slot:name>Location</x-slot:name>

            @foreach($dictionaries['location'] as $location)
            <x-form.checkbox name="location" :value="$location->id" :label="ucwords($location->title)" />
            @endforeach
        </x-form.fieldset>

        <x-form.fieldset>
            <x-slot:name>Payment</x-slot:name>

            @foreach($dictionaries['payment'] as $payment)
            <x-form.radio name="payment" :value="$payment->id" :label="ucwords($payment->title)" />
            @endforeach
        </x-form.fieldset>

        <div class="col-start-1 col-end-4 md:col-start-auto md:col-end-auto">
            <x-form.fieldset>
                <x-slot:name>Salary</x-slot:name>

                <div class="flex gap-2 items-center mt-4">
                    <div class="flex gap-2 items-center">
                        <input type="number" name="salary_beg" class="max-w-24 rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" /> -
                        <input type="number" name="salary_end" class="max-w-24 rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                    </div>
                    <x-form.select name="currency" :values="$dictionaries['currency']" />
                </div>
            </x-form.fieldset>

            <div class="pt-6 flex justify-end">
                <x-base-button type="submit" item="button">Search</x-base-button>
            </div>
        </div>

    </div>
</form>