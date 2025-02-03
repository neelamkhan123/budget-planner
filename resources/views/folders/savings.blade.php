<x-dashboard-layout>
    @if (!$savings)
        <div class="flex justify-center items-center">
            <form method="POST" action="/set-savings">
                @csrf
                <div class="relative flex flex-col items-center">
                    <label for="savings_balance" class="text-5xl font-medium mb-6">Enter your current savings
                        balance</label>
                    <div class="flex space-x-2 py-2 items-center">
                        <span class="text-7xl font-bold">£</span>
                        <input type="number" step="any"
                            class="text-7xl border border-lightGray outline-none p-2 w-full rounded-md shadow-sm font-bold no-arrows"
                            name="savings_balance" id="savings_balance" />
                    </div>

                    @error('savings_balance')
                        <p class="text-sm rounded-2xl shadow-2xl px-4 py-2 bg-red-600 text-white">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="dark-button mt-5 text-2xl">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="flex flex-col justify-evenly items-center">
            @if (session('editSavings'))
                <form method="POST" action="/savings">
                    @csrf
                    <div class="relative flex flex-col items-center">
                        <label for="amount" class="text-5xl font-medium mb-6">How much would you like to save?</label>
                        <div class="flex space-x-2 py-2 items-center">
                            <span class="text-7xl font-bold">£</span>
                            <input type="number" step="any"
                                class="text-7xl border border-lightGray outline-none p-2 w-full rounded-md shadow-sm font-bold no-arrows"
                                name="amount" id="amount"/>
                        </div>

                        @error('amount')
                            <p class="text-sm rounded-2xl shadow-2xl px-4 py-2 bg-red-600 text-white">{{ $message }}
                            </p>
                        @enderror

                        <button type="submit" class="dark-button mt-5 text-2xl">
                            Submit
                        </button>
                    </div>
                </form>

                {{-- Current Savings Balance Before Adding --}}
                <div class="flex flex-col justify-center items-center space-y-3">
                    <p class="font-bold tracking-widest text-hotPink">Current Savings Balance</p>
                    <p class="text-6xl font-bold">£{{ $currentSavingsBalance }}</p>
                    <form method="POST" action="/savings/update">
                        @csrf
                        @method('PATCH')
                        <button class="dark-button h-fit">Edit</button>
                    </form>
                </div>
            @else
                <div class="flex space-x-5 items-center">
                    <h3 class="text-5xl font-bold">You've saved <span
                            class="text-hotPink">£{{ $savings->amount }}</span>
                        this
                        month</h3>
                    <form method="POST" action="/savings/edit">
                        @csrf
                        @method('PATCH')
                        <button class="dark-button h-fit">Edit</button>
                    </form>
                </div>

                {{-- Current Savings Balance After Adding --}}
                <div class="flex flex-col justify-center items-center space-y-3">
                    <p class="font-bold tracking-widest text-hotPink">Current Savings Balance</p>
                    <p class="text-6xl font-bold">£{{ $savingsBalance }}</p>
                </div>
            @endif

        </div>
    @endif
</x-dashboard-layout>
