<x-layout>

    <div class="px-4 sm:px-0 pt-36 pb-20">

        <x-base-card :form="true">

            <div>
                @if($user->employer)
                <x-logo src="{{ asset('storage/'.$user->employer->image ?? '') }}" alt="{{ $user->employer->title ?? ''}}"></x-logo>
                @endif
                <x-base-header class="mt-4 text-center">{{ $user->name }}</x-base-header>
                <p class="mt-1 text-base/7 text-center text-gray-900">{{ $user->email }}</p>
            </div>

            <div class="mt-6 border-b border-gray-900/10">
                <dl class="divide-y divide-gray-900/10">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Company Code</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->employer->code ?? '' }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Company Name</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->employer->title ?? ''}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Company Address</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->employer->address ?? '' }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium text-gray-900">Company Url</dt>
                        <dd class="mt-1 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->employer->url ?? ''}}</dd>
                    </div>
                </dl>
            </div>

            <div class="pt-6 flex justify-end">
                <x-base-button href="/profile/edit">Edit</x-base-button>
            </div>

        </x-base-card>

    </div>

</x-layout>