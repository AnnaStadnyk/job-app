<x-layout>
    <div class="px-4 sm:px-0 pt-36 pb-20">

        <x-base-card :form="true">

            <div>
                @if ($job->employer->image)
                <a href="{{ route('employer', $job->employer->title) }}">
                    <x-logo src="{{ asset('storage/'.$job->employer->image ?? '') }}" alt="{{ $job->employer->title ?? ''}}"></x-logo>
                </a>
                @endif
                <x-base-header class="mt-4 text-center">{{ $job->employer->title }}</x-base-header>
                <x-base-link href="{{ $job->employer->url }}" class="block mt-1 text-center text-base/7" target="_blank">{{ $job->employer->url }}</x-base-link>
            </div>

            <div class="mt-6 border-b border-gray-900/10">
                <dl class="divide-y divide-gray-900/10">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Position</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p class="font-medium text-blue-600">{{ $job->title }}</p>
                            <div class="mt-1 sm:mt-2 text-gray-700">{{ $job->description }}</div>
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Type</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ ucwords($job->type->title) }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Location</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ ucwords($job->location->title) }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Salary</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $job->currency->abbr.' '.number_format($job->salary, 2, ',', ' ').' '.$job->payment->abbr }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Requirements</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $job->requirements }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Responsibilities</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $job->duties }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Tags</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0"><x-tags :tags="$job->tags" :small="true" /></dd>
                    </div>
                </dl>
            </div>

            <div class="pt-6 flex items-center justify-between gap-x-6">
                <div>
                    @can('edit', $job)
                    <form action="{{ route('job.delete', $job->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <x-base-button item="button">Delete</x-base-button>
                    </form>
                    @endcan
                </div>
                <div class="flex items-center gap-x-6">
                    <x-base-link href="{{ route('job.index') }}">Back</x-base-link>
                    @can('edit', $job)
                    <x-base-button href="{{ route('job.edit', $job->id) }}">Edit</x-base-button>
                    @endcan
                </div>
            </div>

        </x-base-card>

    </div>

</x-layout>