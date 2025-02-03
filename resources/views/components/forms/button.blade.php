@props(['type' => 'submit', 'classes' => 'dark'])

<button class="{{ $classes }}" type="{{ $type }}">{{ $slot }}</button>
