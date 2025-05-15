<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 bg-white rounded-lg shadow-md">

        <h1 class="text-3xl font-bold text-blue-900 mb-4">{{ $information->title }}</h1>

        @if ($information->image)
            <img src="{{ asset('storage/' . $information->image) }}" class="w-full max-w-xl mx-auto rounded-lg shadow-md object-cover" alt="Gambar">
        @endif

        <div class="mb-4">
            <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">{{ ucfirst($information->category) }}</span>
            @if ($information->deadline)
                <span class="ml-3 text-sm text-gray-600">Deadline: {{ $information->deadline }}</span>
            @endif
        </div>

        <div class="prose max-w-none mb-6">
            {!! nl2br(e($information->description)) !!}
        </div>

        <a href="{{ $information->link }}" target="_blank" rel="noopener"
                class="inline-block bg-[#FF6B00] hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded">
                Daftar Sekarang
         </a>

        <p class="text-sm text-gray-500 mt-6">Diposting oleh: <strong>{{ $information->user->name }}</strong></p>

        <a href="{{ route('informations.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">
            ← Kembali
        </a>
    </div>
</x-app-layout>
