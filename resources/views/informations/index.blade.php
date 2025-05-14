{{-- <x-app-layout>
    <div class="max-w-5xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Informasi</h1>

        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Perlombaan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($perlombaan as $info)
                    <x-information-card :info="$info" />
                @endforeach
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Pelatihan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($pelatihan as $info)
                    <x-information-card :info="$info" />
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-4">Lowongan Pekerjaan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($lowongan as $info)
                    <x-information-card :info="$info" />
                @endforeach
            </div>
        </div>

        @hasrole('mitra')
            <a href="{{ route('informations.create') }}"
            class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded-full shadow-lg transition duration-300 ease-in-out z-50">
                + Tambah Informasi
            </a>
        @endhasrole



    </div>
</x-app-layout> --}}
<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>


<x-app-layout>
    {{-- <div class="max-w-6xl mx-auto py-8"> --}}
    <div class="max-w-6xl mt-5 mx-auto py-8 px-4 bg-[#FFF8F0] rounded-lg">

        {{-- <h1 class="text-3xl font-bold mb-6 text-blue-800">Informasi</h1> --}}

        {{-- === KOMPONEN SCROLLABLE === --}}
        @php
            // $cardClass = 'min-w-[340px] w-[360px] bg-white border rounded-lg shadow p-4 flex-shrink-0';
            $cardClass = 'min-w-[340px] w-[360px] bg-white border border-[#DCDCDC] rounded-xl shadow p-5 flex-shrink-0 text-black';
            $scrollClass = 'flex gap-4 overflow-x-auto pb-2 pl-1 hide-scrollbar';
            // $btnClass = 'text-sm font-semibold px-3 py-1 rounded transition';
            $btnClass = 'text-sm font-semibold px-3 py-1 rounded transition';
        @endphp


        {{-- Perlombaan --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4 text-[#FF6B00]">Perlombaan</h2>
            <div class="{{ $scrollClass }}">
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Lomba Desain Poster</h3>
                    <p class="text-sm text-gray-600 mt-1">Deadline: 20 April 2025</p>
                    <p class="mt-2 text-gray-800">Lomba desain poster untuk Hari Kartini dengan hadiah 2 juta rupiah.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Turnamen Mobile Legends</h3>
                    <p class="text-sm text-gray-600 mt-1">Deadline: 15 April 2025</p>
                    <p class="mt-2 text-gray-800">Daftarkan tim kamu dan menangkan hadiah jutaan rupiah!</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Lomba Cerdas Cermat</h3>
                    <p class="text-sm text-gray-600 mt-1">Deadline: 30 April 2025</p>
                    <p class="mt-2 text-gray-800">Tunjukkan pengetahuan tim Karang Taruna kalian dan rebut piala bergilir!</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Lomba Cerdas Cermat</h3>
                    <p class="text-sm text-gray-600 mt-1">Deadline: 30 April 2025</p>
                    <p class="mt-2 text-gray-800">Tunjukkan pengetahuan tim Karang Taruna kalian dan rebut piala bergilir!</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Lomba Cerdas Cermat</h3>
                    <p class="text-sm text-gray-600 mt-1">Deadline: 30 April 2025</p>
                    <p class="mt-2 text-gray-800">Tunjukkan pengetahuan tim Karang Taruna kalian dan rebut piala bergilir!</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pelatihan --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4 text-[#FF6B00]">Pelatihan</h2>
            <div class="{{ $scrollClass }}">
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Pelatihan Digital Marketing</h3>
                    <p class="text-sm text-gray-600 mt-1">Tanggal: 25 April 2025</p>
                    <p class="mt-2 text-gray-800">Pelatihan gratis untuk pemuda yang ingin belajar pemasaran digital.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Workshop Public Speaking</h3>
                    <p class="text-sm text-gray-600 mt-1">Tanggal: 28 April 2025</p>
                    <p class="mt-2 text-gray-800">Belajar berbicara di depan umum bersama mentor profesional.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Pelatihan Desain Canva</h3>
                    <p class="text-sm text-gray-600 mt-1">Tanggal: 5 Mei 2025</p>
                    <p class="mt-2 text-gray-800">Pelajari desain grafis dasar menggunakan Canva secara gratis.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lowongan --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4 text-[#FF6B00]">Lowongan Pekerjaan</h2>
            <div class="{{ $scrollClass }}">
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Admin Sosial Media</h3>
                    <p class="text-sm text-gray-600 mt-1">PT Cianjur Maju – Full Time</p>
                    <p class="mt-2 text-gray-800">Dicari admin sosial media yang kreatif dan komunikatif.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Barista Kedai Kopi Kita</h3>
                    <p class="text-sm text-gray-600 mt-1">Part Time – Shift Sore</p>
                    <p class="mt-2 text-gray-800">Kedai Kopi Kita membuka lowongan barista. Pelatihan disediakan.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
                <div class="{{ $cardClass }}">
                    <h3 class="text-lg font-bold text-blue-700">Staf Gudang</h3>
                    <p class="text-sm text-gray-600 mt-1">PT Sumber Sejahtera – Full Time</p>
                    <p class="mt-2 text-gray-800">Dibutuhkan staf gudang untuk penempatan Cianjur dengan gaji kompetitif.</p>
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                        <a href="#" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol Tambah --}}
        @hasrole('mitra')
        <a href="{{ route('informations.create') }}"
            class="fixed bottom-6 right-6 bg-[#FF6B00] hover:bg-orange-600 text-white font-bold py-3 px-5 rounded-full shadow-lg transition duration-300 ease-in-out z-50">
            + Buat Postingan
        </a>
        @endhasrole

    </div>
</x-app-layout>
