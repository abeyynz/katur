<x-app-layout>
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
</x-app-layout>
