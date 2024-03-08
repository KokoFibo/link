<div>
    {{-- <title>Registration</title> --}}
    {{-- <x-navbar></x-navbar> --}}
    <livewire:NavbarMenu />
    {{-- <x-app-layout> --}}



    <main class="text-gray-600">
        <h1 class="text-3xl font-semibold text-center mt-5">Registration</h1>


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
