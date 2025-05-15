<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4">
        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('discuss.index') }}"
            class="text-sm text-gray-600 hover:text-orange-600 transition">
                ← Kembali ke daftar diskusi
            </a>

            @if ($discussion->participants->contains(auth()->user()))
                <form action="{{ route('discussions.leave', $discussion->id) }}" method="POST"
                    onsubmit="return confirm('Apakah kamu yakin ingin keluar dari forum ini?')">
                    @csrf
                    <button type="submit"
                            class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                        Keluar dari Forum
                    </button>
                </form>
            @endif
        </div>
        {{-- Judul Diskusi --}}
        <div class="mb-6 border-b pb-4">
            <h1 class="text-3xl font-bold text-gray-900">{{ $discussion->title }}</h1>
            <p class="text-gray-600 mt-1">{{ $discussion->description }}</p>
        </div>

        {{-- Area Diskusi --}}
        <div class="bg-white p-6 rounded-xl shadow mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Diskusi Berlangsung</h2>

            <div class="space-y-5 max-h-[400px] overflow-y-auto pr-2">
                @forelse ($discussion->messages as $msg)
                    @php
                        $isMine = auth()->id() === $msg->user_id;
                    @endphp
                    <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">
                        <div class="flex items-start gap-3 max-w-lg w-full">
                            {{-- Avatar jika bukan milik sendiri --}}
                            @unless($isMine)
                                <div class="w-10 h-10 bg-[#FF6B00] text-white rounded-full flex items-center justify-center font-bold">
                                    {{ strtoupper(substr($msg->user->name, 0, 1)) }}
                                </div>
                            @endunless

                            {{-- Chat Bubble --}}
                            <div class="{{ $isMine ? 'bg-[#FFEDD5]' : 'bg-gray-100' }} px-4 py-2 rounded-xl w-full">
                                <div class="font-medium text-sm text-gray-800">
                                    {{ $msg->user->name }}
                                </div>
                                <div class="text-gray-700 text-sm mt-1 whitespace-pre-line">{{ $msg->message }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $msg->created_at->diffForHumans() }}</div>
                            </div>

                            {{-- Spacer untuk pesan sendiri --}}
                            @if($isMine)
                                <div class="w-10"></div>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Belum ada pesan dalam diskusi ini.</p>
                @endforelse
            </div>
        </div>

        {{-- Form Kirim Pesan --}}
        @if ($discussion->participants->contains(auth()->id()))
            <form action="{{ route('discussions.message', $discussion->id) }}" method="POST" class="bg-white p-4 rounded-xl shadow flex items-end gap-3">
                @csrf
                <textarea name="message" rows="1"
                    class="flex-grow border border-gray-300 p-3 rounded-lg resize-none focus:ring-2 focus:ring-[#FF6B00] focus:outline-none"
                    placeholder="Tulis pesan kamu di sini..."></textarea>
                <button type="submit" class="bg-[#FF6B00] hover:bg-orange-700 text-white px-5 py-2 rounded-lg transition">
                    Kirim
                </button>
            </form>
        @else
            <div class="p-6 bg-yellow-100 text-yellow-800 rounded-lg shadow">
                <p class="font-semibold">Kamu belum bergabung dalam diskusi ini.</p>
                <p class="text-sm mt-1">Klik tombol "Gabung" terlebih dahulu untuk ikut serta dalam diskusi.</p>
            </div>
        @endif

    </div>
</x-app-layout>
