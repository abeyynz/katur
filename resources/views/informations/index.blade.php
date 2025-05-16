
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
        <h1 class="text-3xl font-bold mb-6 text-blue-800 text-center">INFORMASI</h1>

        {{-- === KOMPONEN SCROLLABLE === --}}
        @php
            // $cardClass = 'min-w-[340px] w-[360px] bg-white border rounded-lg shadow p-4 flex-shrink-0';
            $cardClass = 'min-w-[340px] w-[360px] bg-white border border-[#DCDCDC] rounded-xl shadow p-5 flex-shrink-0 text-black';
            $scrollClass = 'flex gap-4 overflow-x-auto pb-2 pl-1 hide-scrollbar';
            // $btnClass = 'text-sm font-semibold px-3 py-1 rounded transition';
            $btnClass = 'text-sm font-semibold px-3 py-1 rounded transition';
        @endphp

        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4 text-[#FF6B00]">Perlombaan</h2>
            <div class="{{ $scrollClass }}">
                @foreach($perlombaan as $info)
                    <div class="{{ $cardClass }}">
                        <h3 class="text-lg font-bold text-blue-700">{{ $info->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">Deadline: {{ $info->deadline }}</p>
                        <p class="mt-2 text-gray-800">{{ $info->description }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('informations.show', $info->id) }}" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                            <a href="{{ $info->link }}" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Pelatihan --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4 text-[#FF6B00]">Pelatihan</h2>
            <div class="{{ $scrollClass }}">
                @foreach($pelatihan as $info)
                    <div class="{{ $cardClass }}">
                        <h3 class="text-lg font-bold text-blue-700">{{ $info->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">Tanggal: {{ $info->deadline }}</p>
                        <p class="mt-2 text-gray-800">{{ $info->description }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('informations.show', $info->id) }}" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                            <a href="{{ $info->link }}" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Lowongan --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4 text-[#FF6B00]">Lowongan Pekerjaan</h2>
            <div class="{{ $scrollClass }}">
                @foreach($lowongan as $info)
                    <div class="{{ $cardClass }}">
                        <h3 class="text-lg font-bold text-blue-700">{{ $info->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $info->company ?? '-' }} – Full Time</p>
                        <p class="mt-2 text-gray-800">{{ $info->description }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('informations.show', $info->id) }}" class="{{ $btnClass }} bg-[#FF6B00] hover:bg-orange-600 text-white">Selengkapnya</a>
                            <a href="{{ $info->link }}" class="{{ $btnClass }} border border-black text-black hover:bg-black hover:text-white">Daftar</a>
                        </div>
                    </div>
                @endforeach
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
