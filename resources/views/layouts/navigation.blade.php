<nav x-data="{ open: false }" class="bg-[#FAF3E0] border-b border-[#DCDCDC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('feed') }}">
                    <img src="{{ asset('img/katur.png') }}" alt="Logo KATUR" class="h-40 w-auto">
                </a>
            </div>

            <!-- Middle Nav Links -->
            <div class="hidden sm:flex space-x-8">
                <x-nav-link :href="route('feed')" :active="request()->routeIs('feed')" class="text-blue-900 hover:text-blue-600 font-semibold">
                    {{ __('Timeline') }}
                </x-nav-link>
                <x-nav-link :href="route('informations.index')" :active="request()->routeIs('informations.index')" class="text-blue-900 hover:text-blue-600 font-semibold">
                    {{ __('Informasi') }}
                </x-nav-link>
                <x-nav-link :href="route('discuss.index')" :active="request()->routeIs('discuss.index')" class="text-blue-900 hover:text-blue-600 font-semibold">
                    {{ __('Diskusi') }}
                </x-nav-link>
            </div>

            <!-- User Menu / Login Register -->
            <div class="hidden sm:flex sm:items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-blue-900 bg-white hover:text-blue-600 transition">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="h-4 w-4 text-blue-900" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-blue-900 hover:text-blue-600">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-blue-900 hover:text-blue-600" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else

                    <a href="{{ route('login') }}" class="px-4 py-2 bg-[#FF6B00] text-white rounded hover:bg-orange-700">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="ml-2 px-4 py-2 bg-yellow-400 text-black rounded hover:bg-yellow-500">
                        Daftar
                    </a>
                @endauth
            </div>

            <!-- Hamburger for Mobile -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md text-blue-900 hover:text-blue-600 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-blue-900 hover:text-blue-600">
                {{ __('Timeline') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('informations.index')" :active="request()->routeIs('informations.index')" class="text-blue-900 hover:text-blue-600">
                {{ __('Informasi') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive User Info -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-blue-900">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-blue-600">{{ Auth::user()->email }}</div>
                @else
                    <div class="font-medium text-base text-blue-900">Guest</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-900 hover:text-blue-600">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" class="text-blue-900 hover:text-blue-600" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <x-responsive-nav-link :href="route('login')" class="text-blue-900 hover:text-blue-600">{{ __('Login') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" class="text-blue-900 hover:text-blue-600">{{ __('Daftar') }}</x-responsive-nav-link>
                @endauth
            </div>
        </div>
    </div>
</nav>
