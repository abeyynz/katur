@props(['info'])

<div class="border rounded-lg shadow-sm p-4 bg-white hover:shadow-md transition duration-200">
    <h3 class="text-lg font-bold text-blue-600">{{ $info->title }}</h3>
    <p class="text-sm text-gray-500 mb-2">{{ ucfirst($info->category) }} • {{ $info->created_at->format('d M Y') }}</p>
    <p class="text-gray-700">{{ Str::limit($info->description, 100) }}</p>

    <div class="mt-4">
        <a href="{{ route('informations.show', $info->id) }}" class="text-blue-500 hover:underline text-sm">Lihat Selengkapnya</a>
    </div>
</div>
