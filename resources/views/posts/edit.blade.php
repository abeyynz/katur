<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Edit Postingan</h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Caption</label>
                <textarea name="caption" rows="3" class="w-full border p-2 rounded" required>{{ old('caption', $post->caption) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Gambar (opsional)</label>
                @if ($post->image_url)
                    <img src="{{ asset('storage/' . $post->image_url) }}" class="w-full max-h-60 object-cover mb-2 rounded">
                @endif
                <input type="file" name="image" class="w-full">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
