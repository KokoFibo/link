<div>
    <title>Registration</title>
    {{-- <x-navbar></x-navbar> --}}
    <livewire:NavbarMenu />
    <main class="text-gray-600">
        <h1 class="text-3xl font-semibold text-center mt-5">Registration {{ $photo }}</h1>
        <button type="button" wire:click="$set('is_add', true)"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Add
            New Data</button>

        {{-- Add Data --}}
        @if ($is_add || $is_edit)
            @include('registration-form')
        @endif

        @if ($is_add == false && $is_edit == false)
            {{-- table --}}
            @include('registration-table')
        @endif


</div>






</main>
</div>
