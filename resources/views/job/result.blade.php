<x-layout>
    <div class="pt-36 pb-20">
        <x-base-section header="Search Results">
            <div class="space-y-6" id="loaded-job">
                @foreach($jobs as $job)
                <x-job-card-wide :job="$job"></x-job-card-wide>
                @endforeach
            </div>
        </x-base-section>

    </div>

    <div id="loaded-target">
        <p id="cursor" class="hidden">{{ $nextCursor }}</p>
    </div>
</x-layout>