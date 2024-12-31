<x-auth-layout>
  <form method="POST" action="/login" class="flex flex-col justify-center h-full w-full">
    @csrf
    <x-forms.form-field label="Email" name="email" id="email" type="email" />
    <x-forms.form-field label="Password" name="password" id="password" type="password" />

    <x-forms.button classes="dark-button mt-4">
      Log In
    </x-forms.button>
  </form>
</x-auth-layout>