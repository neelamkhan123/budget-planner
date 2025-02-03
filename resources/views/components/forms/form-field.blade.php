@props(['label', 'name', 'id', 'type' => 'text'])

<div class="mb-5">
  <x-forms.label :for="$id">{{ $label }}</x-forms.label>
  <x-forms.input :name="$name" :id="$id" :type="$type" :value="old($name)" />
  @error($name)
  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>