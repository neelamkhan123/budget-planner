@props(['for'])

<label for="{{ $for }}" class="block text-sm font-semibold text-black mb-1">
    {{ $slot }}
</label>
