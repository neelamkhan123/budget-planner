@props(['name', 'id', 'type' => 'text'])

<input name="{{ $name }}" id="{{ $id }}" type="{{ $type }}" {{ $attributes }} class="input" />