@props(['job'])

<x-base-card class="flex items-start gap-4 sm:gap-6" :article="true">
    <div class="hidden lg:flex">
        <a href="{{ route('employer', $job->employer->title) }}">
            <x-logo src="{{ asset('storage/'.$job->employer->image ?? '') }}" alt="{{ $job->employer->title ?? ''}}"></x-logo></a>
    </div>

    <div class="flex-1 ">
        <time datetime="{{ $job->created_at }}" class="text-gray-500">{{ date('M j, Y',
                            strtotime($job->created_at)) }}</time>
        <h3 class="mt-1 text-lg/6 sm:text-xl/8 font-medium text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
            <a href="{{ route('job.show', $job->id) }}">
                {{ $job->title }}
            </a>
        </h3>
        <p class="mt-2 font-medium text-gray-900">
            {{ $job->currency->abbr.' '.number_format($job->salary, 2, ',', ' ').' '.$job->payment->abbr }}
        </p>
        <p class="mt-6 text-gray-600">
            {{ ucwords ($job->type->title) }} -
            {{ ucwords ($job->location->title) }}
        </p>
    </div>

    <div class="flex flex-col gap-4 items-end justify-between max-w-40 lg:max-w-96">
        <div class="flex gap-4">
            <x-tags :tags="$job->tags" :small="true" />
        </div>
        <div class="lg:hidden">
            <a href="{{ route('employer', $job->employer->title) }}">
                <x-logo src="{{ asset('storage/'.$job->employer->image ?? '') }}" alt="{{ $job->employer->title ?? ''}}"></x-logo></a>
        </div>
    </div>
</x-base-card>