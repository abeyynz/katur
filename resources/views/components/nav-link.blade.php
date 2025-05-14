@props(['active'])

{{-- @php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-yellow-400 text-sm font-medium leading-5 text-blue-900 focus:outline-none focus:border-yellow-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-800 hover:text-blue-600 hover:border-yellow-300 focus:outline-none focus:text-blue-600 focus:border-yellow-400 transition duration-150 ease-in-out';
@endphp --}}

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#FF6B00] text-sm font-medium leading-5 text-black hover:text-[#FF6B00] focus:outline-none focus:border-[#FF6B00] transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-black hover:text-[#FF6B00] hover:border-[#FF6B00] focus:outline-none focus:text-[#FF6B00] focus:border-[#FF6B00] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
