<x-layout>
    <div class="w-full h-1/6 flex justify-between bg-folder p-2 relative">
        {{-- Reset Button --}}
        <form method="POST" action="/reset">
            @csrf
            @method('DELETE')
            <button class="dark-button h-fit">Reset</button>
        </form>

        {{-- Budget --}}
        <div class="text-center flex flex-col justify-center items-center self-center">
            <h3 class="text-hotPink font-bold tracking-wider mb-2">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $budget->start_date)->format('jS F') }} -
                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $budget->end_date)->format('jS F') }}
            </h3>
            <a href="/budget" class="text-7xl font-bold py-2">£{{ $budget->budget_value }}</a>
        </div>

        {{-- Remaining Balance --}}
        <div class="text-end">
            <h3 class="text-green-600 font-bold tracking-widest">Remaining Balance</h3>
            <h4 class="font-bold text-4xl">£{{$remainingBalance}}</h4>
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
        <div class="bg-folder w-full h-full rounded-lg flex justify-center overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</x-layout>