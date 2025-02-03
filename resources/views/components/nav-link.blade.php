@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'bg-folder text-hotPink' : 'bg-hotPink text-white' }} cursor-pointer px-8 py-2 rounded-t-md font-bold text-lg">
    {{ $slot }}
</a>