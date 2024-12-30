<x-auth-layout>
    <form method="POST" action="/login" class="flex flex-col">
        @csrf
        <x-forms.form-field label="Email" name="email" id="email" type="email" />
        <x-forms.form-field label="Password" name="password" id="password" type="password" />

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Login
        </button>
    </form>
</x-auth-layout>
