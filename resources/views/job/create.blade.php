<x-layout>
    <div class="px-4 sm:px-0 pt-36 pb-20">

        <x-base-card :form="true">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <x-logo src="{{ asset('storage/'.'logo.svg') }}" alt="Logo"></x-logo>
                <x-base-header class="mt-4 text-center">Create New Job</x-base-header>
            </div>

            <form action="{{ route('job.store') }}" method="POST" novalidate>
                <x-job.create-form :$dictionaries />

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-base-link href="{{ route('job.index') }}">Cancel</x-base-link>
                    <x-base-button item="button">Save</x-base-button>
                </div>
            </form>

        </x-base-card>

    </div>

</x-layout>