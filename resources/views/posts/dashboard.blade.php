<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Postingan Saya</h2>

        @if ($posts->isEmpty())
            <p class="text-gray-500">Belum ada postingan.</p>
        @else
            <div class="space-y-4">
                @foreach ($posts as $post)
                    <div class="p-4 border rounded shadow-sm bg-white">
                        <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $post->created_at->format('d M Y') }}</p>
                        @if ($post->image_url)
                            <img src="{{ asset('storage/' . $post->image_url) }}" alt="Gambar"
                                class="w-full max-h-60 object-cover rounded-md mb-4">
                        @endif
                        <p class="mt-2">{{ Str::limit($post->body, 100) }}</p>

                        <div class="mt-4 flex gap-3">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
