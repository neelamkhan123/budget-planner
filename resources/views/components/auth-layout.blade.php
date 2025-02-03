<x-layout>
  <div class="flex flex-col justify-center items-center h-full">
    <div class="flex space-x-3">
      <x-nav-link :active="request()->is('/')" href="/">Register</x-nav-link>
      <x-nav-link :active="request()->is('login')" href="/login">Log In</x-nav-link>
    </div>
    <div class="bg-folder px-8 py-6 rounded-lg shadow-lg w-1/4 h-1/2 flex justify-center items-center">
      {{ $slot }}
    </div>
  </div>
</x-layout>