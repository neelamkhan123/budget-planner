@props(['name', 'id', 'type' => 'text'])

<input name="{{ $name }}" id="{{ $id }}" type="{{ $type }}" {{ $attributes }}
  class="border border-lightGray outline-none p-2 w-full rounded-md shadow-sm text-sm" />
