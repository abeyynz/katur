
<x-guest-layout>
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center bg-[#FFF8F0]">
        {{-- Kiri: Logo & Deskripsi --}}
        <div class="hidden md:flex flex-col justify-center items-center w-full md:w-1/2 p-10 ml-20">
            <img src="{{ asset('img/kat.png') }}" alt="Logo Katur" class="w-60 h-42 mb-4">
            <h1 class="text-4xl font-bold text-[#FF6B00] mb-5">Selamat Datang di Katur</h1>
            <p class="text-gray-700 text-center max-w-100 text-xl ">
                Katur adalah platform pemuda Cianjur untuk berbagi kegiatan, berdiskusi, dan tumbuh bersama.
                Masuk untuk mulai berkontribusi dan terhubung dengan Karang Taruna di sekitarmu!
            </p>
        </div>

        {{-- Kanan: Form Login --}}
        <div class="w-full md:w-1/2 max-w-md mx-auto px-6 py-10 bg-white rounded-xl shadow-lg border border-[#DCDCDC]">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block font-semibold text-gray-800 mb-1">Email</label>
                    <x-text-input id="email" class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                </div>

                <div>
                    <label for="password" class="block font-semibold text-gray-800 mb-1">Password</label>
                    <x-text-input id="password" class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-[#DCDCDC] text-[#FF6B00] focus:ring-[#FF6B00]">
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">Ingat saya</label>
                </div>

                <div class="flex items-center justify-between mt-2">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#FF6B00] hover:underline" href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                    @endif

                    <x-primary-button class="bg-[#FF6B00] hover:bg-orange-700 text-white px-4 py-2 rounded-md shadow">
                        Masuk
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center text-sm mt-4 text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-[#FF6B00] hover:underline">Daftar sekarang</a>
            </div>
        </div>
    </div>
</x-guest-layout>
