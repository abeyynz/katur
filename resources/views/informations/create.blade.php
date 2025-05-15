{{-- <x-app-layout>
    <div class="max-w-xl mx-auto py-10">
        <h2 class="text-xl font-bold mb-4">Tambah Informasi</h2>

        <form action="{{ route('informations.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Kategori</label>
                <select name="category" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="perlombaan">Perlombaan</option>
                    <option value="pelatihan">Pelatihan</option>
                    <option value="lowongan">Lowongan Pekerjaan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Posting</button>
        </form>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-4 bg-white rounded-lg shadow-md">

        <h1 class="text-2xl font-bold mb-6 text-blue-800">Tambah Informasi Baru</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('informations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block font-semibold mb-1">Judul</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Deskripsi</label>
                <textarea id="description" name="description" rows="4" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="category" class="block font-semibold mb-1">Kategori</label>
                <select id="category" name="category" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="perlombaan" {{ old('category') == 'perlombaan' ? 'selected' : '' }}>Perlombaan</option>
                    <option value="pelatihan" {{ old('category') == 'pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                    <option value="lowongan" {{ old('category') == 'lowongan' ? 'selected' : '' }}>Lowongan Pekerjaan</option>
                </select>
            </div>

            <div>
                <label for="deadline" class="block font-semibold mb-1">Deadline / Tanggal Event</label>
                <input type="text" id="deadline" name="deadline" value="{{ old('deadline') }}"
                    placeholder="Contoh: 20 April 2025 atau 25 April 2025"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="link" class="block font-semibold mb-1">Link Pendaftaran (jika ada)</label>
                <input type="url" id="link" name="link" value="{{ old('link') }}"
                    placeholder="https://example.com/daftar"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="image" class="block font-semibold mb-1">Gambar (opsional)</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full" />
            </div>

            <div>
                <button type="submit"
                    class="bg-[#FF6B00] hover:bg-orange-600 text-white font-bold px-6 py-2 rounded transition">
                    Simpan Informasi
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
