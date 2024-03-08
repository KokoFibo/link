<div>
    {{-- <title>Registration</title> --}}
    {{-- <x-navbar></x-navbar> --}}
    <livewire:NavbarMenu />
    {{-- <x-app-layout> --}}



    <main class="text-gray-600">
        <h1 class="text-3xl font-semibold text-center mt-5">Registration edit: {{ $is_edit }}, Add:
            {{ $is_add }}</h1>

        <button type="button" wire:click="addNew"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Add
            New Data</button>
        {{-- Add Data --}}

        @if ($form_open)
            @include('registration-form')
        @endif

        @if ($form_open == false)
            {{-- table --}}
            @include('registration-table')
        @endif

    </main>
    {{-- </x-app-layout> --}}

</div>
