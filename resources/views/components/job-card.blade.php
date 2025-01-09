@props(['job'])

<x-base-card class="flex flex-col" :article="true">
    <div class="flex items-center gap-x-4">
        <time datetime="{{ $job->created_at }}" class="text-gray-500">{{ date('M j, Y',
                        strtotime($job->created_at)) }}</time>
        <a href="{{ route('employer', $job->employer->title) }}"
            class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-medium text-blue-600 hover:bg-blue-100 transition-colors duration-300">{{
                        $job->employer->title }}</a>
    </div>
    <div class="flex-1">
        <h3 class="mt-3 text-lg/6 sm:text-xl/8 font-medium text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
            <a href="{{ route('job.show', $job->id) }}">
                {{ $job->title }}
            </a>
        </h3>
        <p class="mt-3 font-medium text-gray-900">
            {{ $job->currency->abbr.' '.number_format($job->salary, 2, ',', ' ').' '.$job->payment->abbr }}
        </p>
        <p class="mt-4 line-clamp-3 text-gray-600 ">{{ $job->description }}</p>
    </div>
    <div class="mt-8">
        <x-tags :tags="$job->tags" :small="true" />
    </div>
</x-base-card>