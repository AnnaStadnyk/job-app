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

            <form action="/profile/edit" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mt-12 border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-medium text-gray-900">User Information</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, soluta?</p>

                    <div class="mt-10 space-y-6">
                        <x-form.input name="name" label="Full Name" autocomplete="name" value="{{ old('name', $user->name) }}" required />
                        <x-form.input type="password" label="Password" name="password" required />
                        <x-form.input type="password" label="Password Confirmation" name="password_confirmation" required />
                    </div>
                </div>

                <div class="mt-6 border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-medium text-gray-900">Company Information</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, modi?</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <x-form.input name="code" label="Company Code" value="{{ old('code', $user->employer->code ?? '') }}" required />
                        </div>

                        <div class="sm:col-span-4">
                            <x-form.input name="title" label="Company Name" value="{{ old('title', $user->employer->title ?? '') }}" required />
                        </div>

                        <div class="sm:col-span-full">
                            <x-form.input name="address" label="Company Address" autocomplete="address" value="{{ old('address', $user->employer->address ?? '') }}" required />
                        </div>

                        <div class="col-span-full">
                            <label for="image" class="block text-sm/6 font-medium text-gray-900">Logo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                @if (! empty($user->employer->image))
                                <img src="{{ asset('storage/'.$user->employer->image) }}" alt="{{ $user->employer->title ?? 'Logo'}}" class="h-10 aspect-square rounded-full" />
                                @else
                                <svg class="size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                </svg>
                                @endif

                                <label for="image" class="relative cursor-pointer rounded-md bg-white px-3 py-1.5 sm:py-2.5 font-medium text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors duration-300">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <x-form.error name="image" />
                            </div>
                        </div>

                        <div class="sm:col-span-full">
                            <x-form.input type="url" name="url" label="Company URL" autocomplete="url" value="{{ old('url', $user->employer->url ?? '') }}" required />
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-base-link href="/profile">Cancel</x-base-link>
                    <x-base-button item="button">Save</x-base-button>
                </div>
            </form>

        </x-base-card>

    </div>

</x-layout>