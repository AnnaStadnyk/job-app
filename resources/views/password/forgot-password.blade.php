<x-layout>

    @if(session('status'))
    <div class="px-4 sm:px-0 py-36 min-h-screen">
        <div class="mb-4">
            {{ session('status') }}
        </div>
    </div>
    @else
    <div class="flex flex-col justify-center px-4 sm:px-0 py-20 min-h-screen">

        <x-base-card :form="true" class="w-full max-w-md mx-auto">

            <div>
                <x-logo src="https://tailwindui.com/plus/img/logos/mark.svg?color=blue&shade=600" alt="Your Company"></x-logo>
                <x-base-header class="mt-4 text-center">Password Reset</x-base-header>
            </div>

            <form class="space-y-6" action="{{ route('password.email') }}" method="POST" novalidate>
                @csrf
                <x-form.input type="email" label="Email address" name="email" autocomplete="email" value="{{ old('email') }}" required />

                <div>
                    <x-base-button class="w-full" item="button">Send</x-base-button>
                </div>
            </form>

        </x-base-card>

    </div>
    @endif

</x-layout>