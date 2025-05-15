<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">
        {{-- Judul dan Deskripsi --}}
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-[#000000] mb-2">Diskusi Pemuda</h1>
            <p class="text-gray-700">Temukan dan ikuti diskusi menarik bersama pemuda Cianjur.</p>
        </div>

        {{-- Pencarian Topik --}}
        <form method="GET" action="{{ route('discuss.index') }}" class="mb-10 flex items-center gap-2 max-w-md mx-auto">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari topik diskusi..."
                class="w-full border border-[#DCDCDC] px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B00]">
            <button type="submit" class="bg-[#FF6B00] text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition">
                Cari
            </button>
        </form>


        {{-- Daftar Diskusi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @foreach ($discussions as $discussion)
                <div class="bg-white border border-[#DCDCDC] rounded-lg p-4 shadow-sm">
                    <h2 class="text-lg font-semibold text-[#000000] mb-1">{{ $discussion->title }}</h2>
                    <p class="text-sm text-gray-600 mb-2">{{ $discussion->description }}</p>
                    <p class="text-xs text-gray-500 mb-4">{{ $discussion->participants_count }} orang bergabung</p>
                    <div class="flex justify-between items-center">
                        <form action="{{ route('discussions.join', $discussion->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm bg-[#FF6B00] text-white px-3 py-1 rounded hover:bg-orange-700 transition">
                                Gabung
                            </button>
                        </form>
                        <a href="{{ route('discussions.show', $discussion->id) }}" class="text-sm border border-black text-black px-3 py-1 rounded hover:bg-black hover:text-white transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-2">
            {{ $discussions->withQueryString()->links() }}
        </div>
        {{-- Ajukan Topik Baru --}}
        <div class="bg-[#FAF3E0] mt-6 p-6 rounded-lg shadow-inner border border-[#DCDCDC]">
            <form method="POST" action="{{ route('discuss.store') }}">
            @csrf
            <h3 class="text-xl font-semibold text-[#000000] mb-4 text-center">Ajukan Topik Baru</h3>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-800">Judul Topik</label>
                <input name="title" type="text" class="w-full border border-[#DCDCDC] px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B00]">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-800">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full border border-[#DCDCDC] px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B00]"></textarea>
            </div>
            <button type="submit" class="bg-[#FF6B00] text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition">Ajukan</button>
        </form>
        </div>
    </div>
</x-app-layout>
