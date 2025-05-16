
<x-app-layout>
    <div class="max-w-xl mx-auto mt-20 bg-[#FFF8F0] p-6 rounded shadow border border-[#DCDCDC]">
        {{-- <h2 class="text-xl font-bold text-[#000000] mb-4">Buat Postingan Kegiatan</h2> --}}
        <h2 class="text-lg font-semibold mb-3 text-[#FF6B00]">Post Kegiatan</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="caption" class="block font-medium text-[#000000]">Caption</label>
                <textarea name="caption" id="caption" rows="3"
                    class="w-full border border-[#DCDCDC] rounded p-2 focus:ring-2 focus:ring-[#FF6B00] focus:outline-none bg-white text-[#000000]">{{ old('caption') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-medium text-[#000000]">Upload Gambar</label>
                <input type="file" name="image" id="image"
                    class="w-full border border-[#DCDCDC] rounded p-2 focus:ring-2 focus:ring-[#FF6B00] focus:outline-none bg-white text-[#000000]">
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('feed') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                    class="bg-[#FF6B00] hover:bg-orange-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                    Posting
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
