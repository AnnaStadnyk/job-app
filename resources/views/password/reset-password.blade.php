<x-layout>

    <div class="flex flex-col justify-center px-4 py-20 min-h-screen">

        <x-base-card :form="true" class="w-full max-w-md mx-auto">

            <div>
                <x-logo src="{{ asset('storage/'.'logo.svg') }}" alt="Logo"></x-logo>
                <x-base-header class="mt-4 text-center">Password Reset</x-base-header>
            </div>

            <form class="space-y-6" action="{{ route('password.update') }}" method="POST" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <x-form.input type="email" label="Email address" name="email" autocomplete="email" value="{{ old('email') }}" required />
                <x-form.input type="password" label="Password" name="password" required />
                <x-form.input type="password" label="Password Confirmation" name="password_confirmation" required />

                <div>
                    <x-base-button class="w-full" item="button">Reset</x-base-button>
                </div>
            </form>

        </x-base-card>
    </div>
</x-layout>