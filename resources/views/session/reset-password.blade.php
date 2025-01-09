<x-layout>

  <div class="px-4 sm:px-0 py-36 min-h-screen">
    @if(session('status'))
    <div class="mb-4">
      {{ session('status') }}
    </div>
    @endif
    <p class="text-sm/6 text-gray-500">You can <x-base-link href="/login">login</x-base-link> to your account.</p>
  </div>

</x-layout>