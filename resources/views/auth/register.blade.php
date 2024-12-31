<x-auth-layout>
  <form method="POST" action="/" class="flex flex-col justify-center h-full w-full">
    @csrf
    <x-forms.form-field label="First Name" name="first_name" id="first_name" />
    <x-forms.form-field label="Last Name" name="last_name" id="last_name" />
    <x-forms.form-field label="Email" name="email" id="email" type="email" />
    <x-forms.form-field label="Password" name="password" id="password" type="password" />

    <x-forms.button classes="dark-button mt-4">
      Register
    </x-forms.button>
  </form>
</x-auth-layout>
