<x-layout>
    <div class="pt-36 pb-20 space-y-12">

        <x-base-section header="Find Your Next Job ..." class="max-w-lg mx-auto w-full text-center">
            <form action="{{ route('search') }}">
                <x-form.search name="q" placeholder="Web Developer ..." />
            </form>
        </x-base-section>

        <x-base-section header="Featured Jobs">
            <div class="grid grid-cols-1 gap-6 lg:gap-8 md:grid-cols-2 xl:grid-cols-3 justify-center">
                @foreach($jobs['featured'] as $job)
                <x-job-card :job="$job"></x-job-card>
                @endforeach
            </div>
        </x-base-section>

        <x-base-section header="Tags">
            <x-tags :$tags />
        </x-base-section>

        <x-base-section header="Filters">
            <x-base-card :form="true">
                <x-job.filter-form :$dictionaries></x-job.filter-form>
            </x-base-card>
        </x-base-section>

        <x-base-section header="Recent Jobs">
            <div class="space-y-6" id="loaded-job">
                @foreach($jobs['recent'] as $job)
                <x-job-card-wide :job="$job"></x-job-card-wide>
                @endforeach
            </div>
        </x-base-section>

    </div>

    <div id="loaded-target">
        <p id="cursor" class="hidden">{{ $nextCursor }}</p>
    </div>
</x-layout>