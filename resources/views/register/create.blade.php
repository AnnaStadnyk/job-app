<x-layout>

    <div class="flex flex-col justify-center px-4 sm:px-0 py-20 min-h-screen">

        <x-base-card :form="true" class="w-full max-w-md mx-auto">

            <div>
                <x-logo src="{{ asset('storage/'.'logo.svg') }}" alt="Logo"></x-logo>
                <x-base-header class="mt-4 text-center">Create Your Account</x-base-header>
            </div>

            <form class="space-y-6" action="/register" method="POST" novalidate>
                @csrf
                <x-form.input name="name" label="Full Name" autocomplete="name" value="{{ old('name') }}" required />
                <x-form.input type="email" label="Email address" name="email" autocomplete="email" value="{{ old('email') }}" required />
                <x-form.input type="password" label="Password" name="password" required />
                <x-form.input type="password" label="Password Confirmation" name="password_confirmation" required />

                <div>
                    <x-base-button class="w-full" item="button">Sign In</x-base-button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Are you a member?
                <x-base-link href="/login">Sign in to your account</x-base-link>
            </p>

        </x-base-card>

    </div>

</x-layout>