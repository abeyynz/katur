{{-- <x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Kegiatan Karang Taruna</h1>

        @foreach ($posts as $post)
            <div class="mb-6 border rounded p-4 shadow">
                <div class="mb-2 text-sm text-gray-500">Diposting oleh {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}</div>
                <img src="{{ asset('storage/' . $post->image_url) }}" class="w-full rounded mb-2">
                <p>{{ $post->caption }}</p>

                <div class="mt-4 border-t pt-2">
                    <h4 class="font-semibold mb-2">Komentar</h4>

                    @php
                        $firstComment = $post->comments->first();
                    @endphp

                    @if ($firstComment)
                        <div class="mb-2 text-sm border rounded p-2">
                            <strong>{{ $firstComment->user->name }}</strong>: {{ $firstComment->content }}
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Belum ada komentar.</p>
                    @endif

                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline text-sm">Lihat semua komentar</a>

                    @auth
                        <form action="{{ route('comments.store') }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Tulis komentar..."></textarea>
                            <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Kirim</button>
                        </form>
                    @endauth
                </div>

            </div>
        @endforeach

        {{ $posts->links() }}

        @auth
            <a href="{{ route('posts.create') }}"
               class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded-full shadow-lg transition duration-300 ease-in-out z-50">
                + Buat Postingan
            </a>
        @endauth
    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            @foreach ($posts as $post)
                <div class="mb-6 border rounded p-4 shadow">
                    <div class="mb-2 text-sm text-gray-500">Diposting oleh {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}</div>
                    <img src="{{ asset('storage/' . $post->image_url) }}" class="w-full rounded mb-2">
                    <p>{{ $post->caption }}</p>

                    <div class="mt-4 border-t pt-2">
                        <h4 class="font-semibold mb-2">Komentar</h4>

                        @php
                            $firstComment = $post->comments->first();
                        @endphp

                        @if ($firstComment)
                            <div class="mb-2 text-sm border rounded p-2">
                                <strong>{{ $firstComment->user->name }}</strong>: {{ $firstComment->content }}
                            </div>
                        @else
                            <p class="text-sm text-gray-500">Belum ada komentar.</p>
                        @endif

                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline text-sm">Lihat semua komentar</a>

                        @auth
                            <form action="{{ route('comments.store') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Tulis komentar..."></textarea>
                                <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Kirim</button>
                            </form>
                        @endauth
                    </div>

                </div>
            @endforeach

            {{ $posts->links() }}
            {{-- Postingan 1 --}}
            <div class="mb-6 border border-[#DCDCDC] rounded p-4 shadow bg-white">
                <div class="mb-2 text-sm text-gray-500">Diposting oleh <strong>Ahsan Mudzakkir</strong> - 2 jam lalu</div>
                <img src="{{ asset('img/kegiatan1.jpeg') }}" class="w-full rounded mb-2" alt="Kegiatan 1">
                <p class="text-gray-800">Pelatihan kewirausahaan sukses digelar dengan antusiasme tinggi dari para pemuda Karang Taruna!</p>

                {{-- Komentar --}}
                <div class="mt-4 border-t border-[#DCDCDC] pt-2">
                    <h4 class="font-semibold mb-2 text-[#FF6B00]">Komentar</h4>

                    <div class="mb-2 text-sm border rounded p-2 bg-gray-50">
                        <strong>Sifa Nurhaliza</strong>: Keren banget kegiatannya, semoga bisa berkelanjutan!
                    </div>

                    <a href="#" class="text-[#FF6B00] hover:underline text-sm">Lihat semua komentar</a>
                    @auth
                        <form action="#" method="POST" class="mt-2">
                            @csrf
                            <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Tulis komentar..."></textarea>
                            {{-- <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Kirim</button> --}}
                            <button type="submit" class="mt-2 bg-[#FF6B00] text-white px-4 py-1 rounded hover:bg-orange-700">Kirim</button>
                        </form>
                    @endauth
                </div>
            </div>

            {{-- Postingan 2 --}}
            <div class="mb-6 border border-[#DCDCDC] rounded p-4 shadow bg-white">
                <div class="mb-2 text-sm text-gray-500">Diposting oleh <strong>Abida Lin Himmah</strong> - 1 hari lalu</div>
                <img src="{{ asset('img/kegiatan2.jpg') }}" class="w-full rounded mb-2" alt="Kegiatan 2">
                <p class="text-gray-800">Senang sekali melihat antusiasme adik-adik dalam lomba 17-an yang kita adakan minggu lalu 🎉</p>

                {{-- Komentar --}}
                <div class="mt-4 border-t border-[#DCDCDC] pt-2">
                    <h4 class="font-semibold mb-2 text-[#FF6B00]">Komentar</h4>

                    <p class="text-sm text-gray-500">Belum ada komentar.</p>
                    {{-- <a href="#" class="text-blue-600 hover:underline text-sm">Lihat semua komentar</a> --}}

                    @auth
                        <form action="#" method="POST" class="mt-2">
                            @csrf
                            <textarea name="content" rows="2" class="w-full p-2 border rounded" placeholder="Tulis komentar..."></textarea>
                            {{-- <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Kirim</button> --}}
                            <button type="submit" class="mt-2 bg-[#FF6B00] text-white px-4 py-1 rounded hover:bg-orange-700">Kirim</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        {{-- Sidebar --}}
<div class="space-y-6">
    {{-- Youth of the Month --}}
    <div class="bg-white border border-[#DCDCDC] rounded p-4 shadow text-center">
        <h3 class="text-lg font-semibold mb-3 text-[#FF6B00]">Youth of the Month</h3>
        <img src="{{ asset('img/profil.png') }}" alt="Man of the Month" class="w-24 h-24 rounded-full mx-auto mb-2 object-cover">
        <a href="{{ route('profile.show', $youthOfTheMonth->id) }}" class="font-bold text-black hover:underline">{{ $youthOfTheMonth->name }}</a>
        <p class="text-sm text-gray-500">
            Aktif di {{ $youthOfTheMonth->posts_count }} kegiatan dan {{ $youthOfTheMonth->discussion_messages_count }} diskusi
        </p>
    </div>

    {{-- Diskusi Terpopuler --}}
    <div class="bg-white border border-[#DCDCDC] rounded p-4 shadow">
        <h3 class="text-lg font-semibold mb-3 text-[#FF6B00]">Diskusi Terpopuler</h3>
        <ul class="space-y-2 text-sm">
            @foreach ($popularDiscussions as $discussion)
                <li>
                    <a href="{{ route('discussions.show', $discussion->id) }}" class="text-black hover:underline font-medium">{{ $discussion->title }}</a>
                    <p class="text-gray-500 text-xs">{{ $discussion->messages_count }} komentar</p>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Informasi Terbaru --}}
    <div class="bg-white border border-[#DCDCDC] rounded p-4 shadow">
        <h3 class="text-lg font-semibold mb-3 text-[#FF6B00]">Informasi Terbaru</h3>
        <ul class="space-y-2 text-sm">
            @foreach ($latestInformations as $info)
                <li>
                    <a href="{{ route('informations.show', $info->id) }}" class="text-black hover:underline font-medium">{{ $info->title }}</a>
                    <p class="text-gray-500 text-xs">deadline : {{ \Carbon\Carbon::parse($info->deadline)->format('d F Y') }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>

        @auth
            {{-- <a href="{{ route('posts.create') }}"
               class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded-full shadow-lg transition duration-300 ease-in-out z-50">
                + Buat Postingan
            </a> --}}
            <a href="{{ route('posts.create') }}"
                class="fixed bottom-6 right-6 bg-[#FF6B00] hover:bg-orange-700 text-white font-bold py-3 px-5 rounded-full shadow-lg transition duration-300 ease-in-out z-50">
                + Buat Postingan
            </a>
        @endauth
    </div>
</x-app-layout>
