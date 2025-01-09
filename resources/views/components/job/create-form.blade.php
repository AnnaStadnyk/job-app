@props(['job' => null, 'dictionaries'])

@csrf

<div class="mt-12 border-b border-gray-900/10 pb-12">
    <h2 class="text-base/7 font-medium text-gray-900">Job Information</h2>
    <p class="mt-1 text-sm/6 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, soluta?</p>

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-full">
            <x-form.input name="title" label="Position" value="{{ old('title', $job->title ?? '') }}" required />
        </div>
        <div class="sm:col-span-full">
            <x-form.textarea name="description" label="Description">{{ old('description', $job->description ?? '') }}</x-form.textarea>
        </div>
        <x-form.select name="type_id" label="Type" :values="$dictionaries['type']" :value="old('type_id', $job->type->id ?? '')" />
        <x-form.select name="location_id" label="Location" :values="$dictionaries['location']" :value="old('location_id', $job->location->id ?? '')" />
        <x-form.number iName="salary" iLabel="Salary" :iValue="old('salary', $job->salary ?? '')" sName="currency_id" sLabel="Currencies" :sValue="old('currency_id', $job->currency->id ?? '')" :values="$dictionaries['currency']" />
        <x-form.select name="payment_id" label="Payment" :values="$dictionaries['payment']" :value="old('payment_id', $job->payment->id ?? '')" />
        <div class="sm:col-span-full">
            <x-form.textarea name="requirements" label="Requirements">{{ old('requirements', $job->requirements ?? '') }}</x-form.textarea>
        </div>
        <div class="sm:col-span-full">
            <x-form.textarea name="duties" label="Duties">{{ old('duties', $job->duties ?? '') }}</x-form.textarea>
        </div>
    </div>
</div>

<div class="mt-12 border-b border-gray-900/10 pb-12">
    <h2 class="text-base/7 font-medium text-gray-900">Tags</h2>
    <p class="mt-1 text-sm/6 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, soluta?</p>

    <div class="mt-10">
        <x-form.input name="tags" value="{{ ucwords(old('tags', implode(', ', $job?->tags->pluck('title')->all() ?? []))) }}" required />
    </div>
</div>