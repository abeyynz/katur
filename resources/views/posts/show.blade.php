<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h1 class="text-xl font-bold mb-4">Detail Postingan</h1>

        <div class="mb-6 border rounded p-4 shadow">
            <div class="mb-2 text-sm text-gray-500">
                Diposting oleh {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}
            </div>
            <img src="{{ asset('storage/' . $post->image_url) }}" class="w-full rounded mb-2">
            <p class="mb-4">{{ $post->caption }}</p>

            {{-- Semua Komentar --}}
            <h4 class="font-semibold mb-2 border-t pt-2">Komentar</h4>
            @forelse ($post->comments as $comment)
                <div class="mb-2 text-sm border rounded p-2">
                    <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                </div>
            @empty
                <p class="text-sm text-gray-500">Belum ada komentar.</p>
            @endforelse

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
</x-app-layout>
