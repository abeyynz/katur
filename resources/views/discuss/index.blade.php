<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">
        {{-- Judul dan Deskripsi --}}
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-[#000000] mb-2">Diskusi Pemuda</h1>
            <p class="text-gray-700">Temukan dan ikuti diskusi menarik bersama pemuda Cianjur.</p>
        </div>

        {{-- Pencarian Topik --}}
        <div class="mb-10 flex items-center gap-2 max-w-md mx-auto">
            <input type="text" placeholder="Cari topik diskusi..."
                   class="w-full border border-[#DCDCDC] px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B00]">
            <button class="bg-[#FF6B00] text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition">
                Cari
            </button>
        </div>

        {{-- Daftar Diskusi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white border border-[#DCDCDC] rounded-lg p-4 shadow-sm">
                    <h2 class="text-lg font-semibold text-[#000000] mb-1">Pengelolaan Sampah </h2>
                    <p class="text-sm text-gray-600 mb-2">Diskusi pengelolaan sampah yang ada di cianjur</p>
                    <p class="text-xs text-gray-500 mb-4">12 anggota bergabung</p>
                    <div class="flex justify-between items-center">
                        <button class="text-sm bg-[#FF6B00] text-white px-3 py-1 rounded hover:bg-orange-700 transition">Gabung</button>
                        <a href="#" class="text-sm border border-black text-black px-3 py-1 rounded hover:bg-black hover:text-white transition">Lihat Detail</a>
                    </div>
                </div>
            @endfor
        </div>

        {{-- Ajukan Topik Baru --}}
        <div class="bg-[#FAF3E0] p-6 rounded-lg shadow-inner border border-[#DCDCDC]">
            <h3 class="text-xl font-semibold text-[#000000] mb-4">Ajukan Topik Diskusi Baru</h3>
            <form>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-800">Judul Topik</label>
                    <input type="text" class="w-full border border-[#DCDCDC] px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B00]">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-800">Deskripsi</label>
                    <textarea rows="4" class="w-full border border-[#DCDCDC] px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B00]"></textarea>
                </div>
                <button type="submit" class="bg-[#FF6B00] text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition">Ajukan</button>
            </form>
        </div>
    </div>
</x-app-layout>
