<x-dashboard-layout>
  <div class="flex flex-col justify-between w-1/2 h-full pt-5">
    {{-- Expenses --}}
    <div class="content-height overflow-y-scroll relative">
      <div class="flex justify-between items-center mb-6">
        {{-- Heading --}}
        <h3 class="font-bold text-xl pl-4 text-hotPink tracking-wider flex place-self-center">List your expenses here
        </h3>

        <!-- Sort Button -->
        <div class="relative">
          <button type="button" id="sort"
            class="dark-button w-fit flex justify-center items-center space-x-1 cursor-pointer">
            <p>Sort</p>
            <img src="{{ asset('images/ascending-filter-icon.svg') }}" alt="sort" class="w-3 h-3">
          </button>

          <!-- Sort Modal -->
          <div id="modal"
            class="absolute hidden flex-col bg-white border border-gray-300 shadow-lg rounded-md py-2 px-4 w-40 right-0 top-full mt-2 z-50">
            <button id="sort_by_date"
              class="text-xs text-gray-700 hover:text-black hover:bg-gray-100 px-2 py-1 rounded transition">
              Sort by Date
            </button>
            <button id="sort_by_price_asc"
              class="text-xs text-gray-700 hover:text-black hover:bg-gray-100 px-2 py-1 rounded transition">
              Price (Low - High)
            </button>
            <button id="sort_by_price_desc"
              class="text-xs text-gray-700 hover:text-black hover:bg-gray-100 px-2 py-1 rounded transition">
              Price (High - Low)
            </button>
          </div>
        </div>
      </div>

      {{-- Expense Table --}}
      <table class="w-full table-fixed">
        <tr class="border-b border-b-black sticky top-0 bg-folder">
          <th class="w-[30%] pl-2 py-2 text-start border-r font-bold border-r-black">Date of Payment</th>
          <th class="w-[30%] pl-2 py-2 text-start border-r font-bold border-r-black">Expense Title</th>
          <th class="w-[30%] pl-2 py-2 text-start border-r font-bold border-r-black">Expense Value</th>
          <th class="w-[5%] py-2 border-r border-r-black"><img src="{{ asset('images/approve-accept-icon.svg') }}"
              alt="checkbox" class="w-5 h-5 mx-auto pb-1"></th>
          <th class="w-[5%]"></th>
        </tr>

        {{-- Expense Entries --}}
        @foreach ($expenses as $expense)
        <tr class="w-full table-auto border-b border-black text-gray-600">
          {{-- Date Input --}}
          <td class="px-2 text-start border-r border-r-black">{{ \Carbon\Carbon::createFromFormat('Y-m-d',
            $expense->date)->format('jS M') }}
          </td>

          {{-- Title Input --}}
          <td class="px-2 text-start border-r border-r-black">{{$expense->title}}</td>

          {{-- Amount Input --}}
          <td class="px-2 text-start border-r border-r-black">£{{$expense->amount}}</td>

          <td class="flex justify-center items-center h-full py-2">
            <input type="checkbox" name="status" id="status" class="cursor-pointer flex justify-center items-center" />
          </td>

          {{-- Delete Button --}}
          <td class="py-2 px-2 border-l border-l-black">
            <form method="POST" action="/expenses/{{ $expense->id }}" class="flex justify-center items-center">
              @csrf
              @method('DELETE')
              <button class="cursor-pointer">
                <img src="{{ asset('images/delete-icon.svg') }}" alt="delete" class="w-3 h-3">
              </button>
            </form>
          </td>
        </tr>
        @endforeach


        {{-- Inputs --}}
        <tr class="w-full table-auto sticky bottom-0 bg-folder">
          <form method="POST" action="/expenses" class="flex space-x-3 relative">
            @csrf
            {{-- Date Input --}}
            <td class="px-2 py-4 text-start border-r border-r-black relative">
              <input type="date" name="date" id="date" class="border border-hotPink p-1 rounded-lg text-xs w-full" />

              @error('date')
              <div class="absolute -top-6 text-sm rounded-2xl shadow-2xl px-4 py-2 z-400 bg-red-600 text-white">
                {{$message}}
              </div>
              @enderror
            </td>

            {{-- Title Input --}}
            <td class="px-2 py-4 text-start border-r border-r-black relative">
              <input type="text" name="title" id="title" class="border border-hotPink p-1 rounded-lg text-xs w-full" />

              @error('title')
              <div class="absolute -top-6 text-sm rounded-2xl shadow-2xl px-4 py-2 z-400 bg-red-600 text-white">
                {{$message}}
              </div>
              @enderror
            </td>

            {{-- Amount Input --}}
            <td class="w-full px-2 py-4 text-start border-r border-r-black flex space-x-1 relative"><span>£</span>
              <input type="text" name="amount" id="amount"
                class="border border-hotPink p-1 rounded-lg text-xs w-full relative" />

              @error('amount')
              <div
                class="absolute -top-6 text-sm rounded-2xl shadow-2xl px-4 py-2 z-400 bg-red-600 text-white whitespace-nowrap">
                {{$message}}
              </div>
              @enderror
            </td>

            {{-- Submit Button --}}
            <td class="px-2 text-center">
              <button type="submit"
                class="cursor-pointer text-xs text-white bg-green-500 px-4 font-bold py-4 rounded-lg shadow-sm hover:bg-green-400 hover:shadow-none transition-all duration-200 ease-in-out flex justify-center items-center">Enter</button>
            </td>

            <td></td>
          </form>
        </tr>
      </table>
    </div>

    {{-- Total --}}
    <div
      class="total-height w-full flex justify-between items-center text-lg font-bold bg-white rounded-lg px-6 py-6 mb-4 border-2 border-hotPink">
      <h3>
        Total
      </h3>
      <div>
        £{{ $total }}
      </div>
    </div>
  </div>
</x-dashboard-layout>

<style scoped>
  .content-height {
    height: 90%
  }

  .total-height {
    height: 5%;
  }

  ::-webkit-scrollbar {
    width: 0px;
  }
</style>