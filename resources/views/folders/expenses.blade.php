<x-dash-layout>
  <div class="flex flex-col justify-between w-full h-full p-5">
    {{-- Expenses --}}
    <div>
      {{-- Sort Button --}}
      <div class="dark-button w-fit flex justify-center items-center space-x-1">
        <p>Sort</p>
        <img src="{{ asset('images/ascending-filter-icon.svg') }}" alt="Sort" class="w-3 h-3">
      </div>

      <div>
        {{-- Date --}}
        <div>
          12th
        </div>

        {{-- Title --}}
        <div>
          Food Shopping
        </div>

        {{-- Amount --}}
        <div>
          £200
        </div>
      </div>
    </div>

    {{-- Total --}}
    <div>
      <div>
        Total
      </div>
    </div>
  </div>
</x-dash-layout>