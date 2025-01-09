<x-layout>
    <div class="px-4 sm:px-0 pt-36 pb-20">

        <x-base-card :form="true">
            <div>
                @if($job->employer->image)
                <a href="{{ route('employer', $job->employer->title) }}">
                    <x-logo src="{{ asset('storage/'.$job->employer->image ?? '') }}" alt="{{ $job->employer->title ?? ''}}"></x-logo>
                </a>
                @endif
                <x-base-header class="mt-4 text-center">{{ $job->title }}</x-base-header>
                <x-base-link href="{{ $job->employer->url }}" class="block mt-1 text-center text-base/7" target="_blank">{{ $job->employer->url }}</x-base-link>
            </div>

            <form action="{{ route('job.update', $job->id) }}" method="POST" novalidate>
                @method('patch')
                <x-job.create-form :$job :$dictionaries />

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-base-link href="{{ route('job.show', $job->id) }}">Cancel</x-base-link>
                    <x-base-button item="button">Save</x-base-button>
                </div>
            </form>

        </x-base-card>

    </div>

</x-layout>