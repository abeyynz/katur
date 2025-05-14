{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="grid md:grid-cols-3 gap-6">

            {{-- Kolom Kiri: Profil + Kegiatan --}}
            <div class="space-y-6">
                {{-- Profil --}}
                <div class="bg-[#FFF8F0] border border-[#DCDCDC] rounded-xl p-6 shadow-sm">
                    <div class="text-center">
                        <img src="{{ asset('img/profil.png') }}" alt="Ahsan Mudzakkir"
                            class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                        <h2 class="text-xl font-bold text-[#000000]">Ahsan Mudzakkir</h2>
                        <p class="text-sm text-gray-600">Ciranjang, Ciranjang</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-[#FF6B00] font-semibold mb-2">Tentang Rizky</h3>
                        <p class="text-sm text-gray-700">
                            Aktif sebagai pemuda di wilayah Cianjur dan senang mengikuti kegiatan sosial, diskusi, serta pelatihan kewirausahaan.
                        </p>
                    </div>
                </div>

                {{-- Kegiatan Bulan Ini --}}
                <div class="bg-white border border-[#DCDCDC] rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-[#000000] mb-4">Kegiatan Bulan Ini</h3>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        <li>Ikut forum diskusi <span class="text-[#FF6B00] font-medium">"Pemuda & Inovasi Sosial"</span></li>
                        <li>Volunteer acara <span class="text-[#FF6B00] font-medium">"Bakti Sosial Ramadhan"</span></li>
                        <li>Workshop <span class="text-[#FF6B00] font-medium">"Digital Marketing untuk UMKM"</span></li>
                        <li>Ikut forum diskusi <span class="text-[#FF6B00] font-medium">"Pengelolaan sampah"</span></li>
                        <li>Workshop <span class="text-[#FF6B00] font-medium">"Pelatihan kepemimpinan"</span></li>
                        <li>Ikut forum diskusi <span class="text-[#FF6B00] font-medium">"Apakah Cianjur ber..."</span></li>

                    </ul>
                </div>
            </div>

            {{-- Kolom Kanan (span 2 kolom): Feed Postingan --}}
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white border border-[#DCDCDC] rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-[#000000] mb-4">Aktivitas Rizky</h3>

                    {{-- Aktivitas Forum Diskusi --}}
                    <h4 class="text-sm text-gray-500 mt-6 mb-1">💬 Forum Diskusi</h4>

                    <div class="mb-4 border rounded p-4 bg-[#FFF8F0]">
                        <div class="text-sm text-gray-500 mb-1">3 hari lalu di forum <span class="text-[#FF6B00] font-medium">"Pemberdayaan Sampah"</span></div>
                        <p class="text-gray-800 italic">
                            “Menurut saya, sebaiknya pemuda dilibatkan langsung dalam sistem pengelolaan sampah berbasis komunitas…”
                        </p>
                    </div>

                    <div class="mb-4 border rounded p-4 bg-[#FFF8F0]">
                        <div class="text-sm text-gray-500 mb-1">6 hari lalu di forum <span class="text-[#FF6B00] font-medium">"Pemuda & Lingkungan"</span></div>
                        <p class="text-gray-800 italic">
                            “Perlu ada edukasi rutin di desa tentang pentingnya menjaga kebersihan lingkungan. Pemuda bisa jadi motor penggerak utama.”
                        </p>
                    </div>
                    {{-- Feed Postingan --}}
                    <h4 class="text-sm text-gray-500 mb-1">📸 Postingan</h4>

                    {{-- Postingan 1 --}}
                    <div class="mb-4 border rounded p-4 bg-[#FFF8F0]">
                        <div class="text-sm text-gray-500 mb-2">2 hari lalu</div>
                        <img src="{{ asset('img/kegiatan1.jpeg') }}" alt="Post" class="w-full rounded mb-2">
                        <p class="text-gray-800">
                            Kegiatan pelatihan wirausaha hari ini seru banget! Banyak insight baru tentang bisnis digital 💼✨
                        </p>
                    </div>

                    {{-- Postingan 2 --}}

                    <div class="mb-4 border rounded p-4 bg-[#FFF8F0]">
                        <div class="text-sm text-gray-500 mb-2">1 minggu lalu</div>
                        <p class="text-gray-800">
                            Senang bisa terlibat dalam kegiatan bersih-bersih lingkungan bareng warga! 🌱
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
