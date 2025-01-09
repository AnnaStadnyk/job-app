<x-layout>

    <div class="flex flex-col justify-center px-4 py-20 min-h-screen">

        <x-base-card :form="true" class="w-full max-w-md mx-auto">

            <div>
                <x-logo src="{{ asset('storage/'.'logo.svg') }}" alt="Logo"></x-logo>
                <x-base-header class="mt-4 text-center">Sign in to your account</x-base-header>
            </div>

            <form class="space-y-6" action="/login" method="POST" novalidate>
                @csrf
                <x-form.input type="email" name="email" label="Email address" autocomplete="email" value="{{ old('email') }}" required />
                <x-form.input type="password" name="password" label="Password" required />

                <div>
                    <div class="flex items-center justify-between">
                        <x-form.checkbox-simple name="remember_me" label="Remember Me" />
                        <div class="text-sm/6">
                            <x-base-link href="{{ route('password.request') }}">Forgot password?</x-base-link>
                        </div>
                    </div>
                </div>

                <div>
                    <x-base-button class="w-full" item="button">Sign In</x-base-button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Not a member?
                <x-base-link href="/register">Create Your Account</x-base-link>
            </p>

        </x-base-card>
    </div>

</x-layout>