{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center bg-[#FFF8F0]">
        {{-- Kiri: Logo & Deskripsi --}}
        <div class="hidden md:flex flex-col justify-center items-center w-full md:w-1/2 p-10 ml-20">
            <img src="{{ asset('img/kat.png') }}" alt="Logo Katur" class="w-60 h-42 mb-4">
            <h1 class="text-4xl font-bold text-[#FF6B00] mb-2">Gabung bersama Katur</h1>
            <p class="text-gray-700 text-center max-w-100 text-xl">
                Daftar sebagai anggota atau mitra Karang Taruna. Bersama kita bisa menciptakan perubahan positif bagi Cianjur!
            </p>
        </div>

        {{-- Kanan: Form Register --}}
        <div class="w-full md:w-1/2 max-w-md mx-auto px-6 py-10 bg-white rounded-xl shadow-lg border border-[#DCDCDC]">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Nama --}}
                <div>
                    <label for="name" class="block font-semibold text-gray-800 mb-1">Nama</label>
                    <x-text-input id="name" class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-sm" />
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block font-semibold text-gray-800 mb-1">Email</label>
                    <x-text-input id="email" class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                </div>

                {{-- Role (Anggota / Mitra) --}}
                <div>
                    <label for="role" class="block font-semibold text-gray-800 mb-1">Daftar Sebagai</label>
                    <select id="role" name="role" required class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]">
                        <option value="">Pilih peran</option>
                        <option value="anggota" {{ old('role') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                        <option value="mitra" {{ old('role') == 'mitra' ? 'selected' : '' }}>Mitra</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-1 text-red-500 text-sm" />
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block font-semibold text-gray-800 mb-1">Password</label>
                    <x-text-input id="password" class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block font-semibold text-gray-800 mb-1">Konfirmasi Password</label>
                    <x-text-input id="password_confirmation" class="block w-full border border-[#DCDCDC] rounded px-3 py-2 focus:ring-[#FF6B00] focus:border-[#FF6B00]" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
                </div>

                {{-- Tombol Daftar & Link Login --}}
                <div class="flex items-center justify-between mt-2">
                    <a href="{{ route('login') }}" class="text-sm text-[#FF6B00] hover:underline">Sudah punya akun?</a>

                    <x-primary-button class="bg-[#FF6B00] hover:bg-orange-700 text-white px-4 py-2 rounded-md shadow">
                        Daftar
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
