<x-auth-layout>
    <form method="POST" action="/" class="flex flex-col">
        @csrf
        <x-forms.form-field label="First Name" name="first_name" id="first_name" />
        <x-forms.form-field label="Last Name" name="last_name" id="last_name" />
        <x-forms.form-field label="Email" name="email" id="email" type="email" />
        <x-forms.form-field label="Password" name="password" id="password" type="password" />

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Register
        </button>
    </form>
</x-auth-layout>
