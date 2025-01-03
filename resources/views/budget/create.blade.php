<x-layout>
    <div class="flex justify-center items-center h-full">
        <div class="bg-folder px-8 py-6 rounded-lg shadow-lg w-2/4 h-1/2 flex justify-center items-center">
            {{-- Form --}}
            <form method="POST" action="/budget" class="flex flex-col items-center justify-around h-full">
                @csrf
                {{-- Set Budget --}}
                <div class="relative flex flex-col items-center">
                    <label for="budget_value" class="text-5xl font-medium mb-6">Enter your budget</label>
                    <div class="flex space-x-2 py-2 items-center">
                        <span class="text-7xl font-bold">£</span>
                        <input type="number" step="any"
                            class="text-7xl border border-lightGray outline-none p-2 w-full rounded-md shadow-sm font-bold no-arrows"
                            name="budget_value" id="budget_value"
                            value="{{old('budget_value') ?? $budget->budget_value ?? 0}}" />

                    </div>

                    @error('budget_value')
                    <p class="text-sm rounded-2xl shadow-2xl px-4 py-2 bg-red-600 text-white">{{
                        $message
                        }}
                    </p>
                    @enderror
                </div>

                {{-- Set Time Period --}}
                <div class="flex flex-col items-center">
                    <label class="text-xl font-medium mb-2">Set a one month period</label>
                    <div class="flex justify-evenly items-center">
                        <div class="flex flex-col justify-center items-center space-y-4">
                            <input name="start_date" id="start_date" type="date" class="input"
                                value="{{ old('start_date') ?? $budget->start_date ?? null }}" />

                            @error('start_date')
                            <p class="text-sm rounded-2xl shadow-2xl px-4 py-2 bg-red-600 text-white">{{
                                $message
                                }}
                            </p>
                            @enderror
                        </div>

                        <span class="font-bold text-xl mx-4">-</span>

                        <div class="flex flex-col justify-center items-center space-y-4">
                            <input name="end_date" id="end_date" type="date" class="input"
                                value="{{ old('end_date') ?? $budget->end_date ?? null }}" />
                            @error('end_date')
                            <p class="text-sm rounded-2xl shadow-2xl px-4 py-2 bg-red-600 text-white">{{
                                $message
                                }}
                            </p>
                            @enderror
                        </div>
                    </div>

                </div>


                <button type="submit" class="dark-button mt-5 text-2xl">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layout>