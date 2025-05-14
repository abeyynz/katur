<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-4">{{ $info->title }}</h1>
        <p class="text-sm text-gray-500 mb-2">Kategori: {{ ucfirst($info->category) }} • {{ $info->created_at->format('d M Y') }}</p>
        <p class="text-gray-700 whitespace-pre-line">{{ $info->description }}</p>
    </div>
</x-app-layout>
