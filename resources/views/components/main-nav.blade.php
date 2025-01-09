<nav class="bg-gray-800 fixed inset-x-0 top-0 z-50" x-data="{}">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 ">
        <div class="flex h-16 items-center justify-between after:bg-gray-800 after:absolute after:inset-0 after:z-10 md:after:content-none" x-ref="panel">
            <div class="flex items-center">
                <div class="shrink-0 z-20">
                    <x-base-link href="/">
                        <x-logo-svg />
                    </x-base-link>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4">
                        <x-main-link href="/" :active="request()->is(['/', 'job/*/edit']) || request()->routeIs('job.show')">Job</x-main-link>
                        <x-main-link href="/about" :active="request()->is('about')">About Us</x-main-link>
                        <x-main-link href="/contact" :active="request()->is('contact')">Contact</x-main-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex">
                @auth
                <div class="ml-4 flex items-center md:ml-6 gap-x-4">
                    @can('create', App\Models\Job::class)
                    <x-main-link href="{{ route('job.create') }}" :active="request()->routeIs('job.create')">Create</x-main-link>
                    @endcan

                    <div class="relative" x-data="{ open: false }">
                        <div>
                            <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" :aria-expanded="open" aria-haspopup="true" @click="open = !open">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="size-8 rounded-full" src="{{ asset('storage/'.Auth::user()->employer?->image) }}" alt="{{ Auth::user()->employer?->title }}">
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            id="user-menu"
                            x-show="open"
                            @click.outside="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95">
                            <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                            <x-sub-link href="/profile" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</x-sub-link>
                            <div>
                                <form action="/logout" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-sub-link role="menuitem" tabindex="-1" id="user-menu-item-2" kind="button">Sign Out</x-sub-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
                @guest
                @if(!request()->is('register'))
                <x-main-link href="/login" :active="request()->is(['login', 'forgot-password', 'reset-password/*'])">Sign In <span aria-hidden="true">&rarr;</span></x-main-link>
                @else
                <x-main-link href="/register" :active="request()->is('register')">Sign Up <span aria-hidden="true">&rarr;</span></x-main-link>
                @endif
                @endguest
            </div>
            <div class="flex md:hidden"
                x-data="mobileMenu"
                x-effect="block"
                x-resize.document="open = false">
                <!-- Mobile menu button -->
                <button type="button" class="btn relative z-20 inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 transition-colors duration-300"
                    aria-controls="mobile-menu" :aria-expanded="open" id="mobile-button" @click="open = !open" x-ref="button">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon" id="icon-open"
                        x-show="! open">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon" id="icon-close"
                        x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="md:hidden bg-gray-800 pt-16 absolute inset-x-0 top-0"
                    id="mobile-menu"
                    x-show="open"
                    @click.outside="close"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="-translate-y-full"
                    x-transition:enter-end="translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="translate-y-0"
                    x-transition:leave-end="-translate-y-full">
                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                        <x-main-link href="/" :active="request()->is(['/', 'job/*'])" class="block">Job</x-main-link>
                        <x-main-link href="/about" :active="request()->is('about')" class="block">About Us</x-main-link>
                        <x-main-link href="/contact" :active="request()->is('contact')" class="block">Contact</x-main-link>
                    </div>
                    <div class="border-t border-gray-700 py-3">
                        @auth
                        <div class="flex items-center px-5 py-1">
                            <div class="shrink-0">
                                <img class="size-10 rounded-full" src="{{ asset('storage/'.Auth::user()->employer?->image) ?? '' }}" alt="{{ Auth::user()->employer?->title ?? ''}}">
                            </div>
                            <div class="ml-3">
                                <div class="text-base/5 font-medium text-white">{{ Auth::user()->employer?->title }}</div>
                                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                            </div>
                            <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 transition-colors duration-300">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            <x-main-link href="/profile" :active="request()->is('profile')" class="block">Your Profile</x-main-link>
                            <div>
                                <form action="/logout" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-main-link :active="request()->is('logout')" class="w-full block text-left" item="buttom">Sign out</x-main-link>
                                </form>
                            </div>
                        </div>
                        @endauth
                        @guest
                        <div class="px-2 sm:px-3">
                            @if(!request()->is('register'))
                            <x-main-link href="/login" :active="request()->is(['login', 'forgot-password', 'reset-password/*'])" class="block">Sign In <span aria-hidden="true">&rarr;</span></x-main-link>
                            @else
                            <x-main-link href="/register" :active="request()->is('register')" class="block">Sign Up <span aria-hidden="true">&rarr;</span></x-main-link>
                            @endif
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>


</nav>