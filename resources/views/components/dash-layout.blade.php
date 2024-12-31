<x-layout>
    {{-- Budget --}}
    <div class="w-full h-1/6 flex justify-between items-center bg-folder px-4 py-2">
        <div class="flex-grow text-center">
            <h1 class="text-hotPink font-bold tracking-wider">January 2025</h1>
            <h2 class="text-7xl font-bold py-2">£2,776.41</h2>
        </div>
    </div>

    {{-- Folders --}}
    <div class="flex flex-col justify-center items-center h-5/6 w-full px-5 pt-10 pb-5">
        <div class="flex justify-between w-full">
            <div class="flex space-x-3 ml-5">
                <x-nav-link :active="request()->is('expenses')" href="/expenses">Expenses</x-nav-link>
                <x-nav-link :active="request()->is('savings')" href="/savings">Savings</x-nav-link>
                <x-nav-link :active="request()->is('leisure')" href="/leisure">Leisure</x-nav-link>
            </div>

            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')

                <button class="light-button">Logout</button>
            </form>
        </div>
        <div class="bg-folder w-full h-full rounded-lg">
            {{ $slot }}
        </div>
    </div>
</x-layout>