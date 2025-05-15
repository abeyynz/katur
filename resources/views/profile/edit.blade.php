
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
                        <h2 class="text-xl font-bold text-[#000000]">{{ $user->name }}</h2>
                        <p class="text-sm text-gray-600">
                            {{ $user->organization?->desa_kelurahan }}, {{ $user->organization?->kecamatan }}
                        </p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-[#FF6B00] font-semibold mb-2">Tentang {{ $user->name }}</h3>
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
                    <h3 class="text-lg font-bold text-[#000000] mb-4">Aktivitas {{ $user->name }}</h3>

                    {{-- Aktivitas Forum Diskusi --}}
                    <h4 class="text-sm text-gray-500 mt-6 mb-1">💬 Forum Diskusi</h4>

                    @foreach ($recentMessages as $message)
                        <div class="mb-4 border rounded p-4 bg-[#FFF8F0]">
                            <div class="text-sm text-gray-500 mb-1">
                                {{ $message->created_at->diffForHumans() }} di forum
                                <span class="text-[#FF6B00] font-medium">"{{ $message->discussion->title }}"</span>
                            </div>
                            <p class="text-gray-800 italic">“{{ $message->message}}”</p>
                        </div>
                    @endforeach

                    {{-- Feed Postingan --}}
                    <h4 class="text-sm text-gray-500 mb-1">📸 Postingan</h4>

                    {{-- Postingan 1 --}}
                    @foreach ($posts as $post)
                        <div class="mb-4 border rounded p-4 bg-[#FFF8F0]">
                            <div class="text-sm text-gray-500 mb-2">{{ $post->created_at->diffForHumans() }}</div>
                            @if ($post->image_url)
                                <img src="{{ asset('storage/' . $post->image_url) }}" class="w-full rounded mb-2">
                            @endif

                            <p class="text-gray-800">{{ $post->caption }}</p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
