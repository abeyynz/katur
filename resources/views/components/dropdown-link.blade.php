{{-- <a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-blue-800 hover:bg-yellow-100 focus:outline-none focus:bg-yellow-200 transition duration-150 ease-in-out']) }}> --}}
<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-black hover:bg-[#FFEEDC] hover:text-[#FF6B00] focus:outline-none focus:bg-[#FFDFBD] transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>

