<x-layout>

  <div class="px-4 sm:px-0 py-36 min-h-screen">
    @if(session('message'))
    <div class="mb-4">
      {{ session('message') }}
    </div>
    @endif
    <p class="text-sm/6 text-gray-500">Please check your inbox to confirm e-mail address.</p>

    <form action="{{ route('verification.send') }}" method="post">
      @csrf

      <div class="mt-6">
        <x-base-button item="button">Send E-mail</x-base-button>
      </div>
    </form>
  </div>

</x-layout>