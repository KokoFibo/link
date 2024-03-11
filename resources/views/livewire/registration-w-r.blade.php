<div>
    {{-- <title>Registration</title> --}}
    {{-- <x-navbar></x-navbar> --}}
    {{-- <livewire:NavbarMenu /> --}}
    <x-app-layout>

        <div class="text-gray-600">
            <h1 class="text-3xl font-semibold text-center mt-5">Registration</h1>


            {{-- Add Data --}}

            @if ($form_open)
                @include('registration-form')
            @endif

            @if ($form_open == false)
                {{-- table --}}
                @include('registration-table')
            @endif

        </div>
        {{-- </x-app-layout> --}}

    </x-app-layout>

</div>
