<div>
    {{-- <title>Registration</title> --}}
    {{-- <x-navbar></x-navbar> --}}
    {{-- <livewire:NavbarMenu /> --}}
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Registration') }}
            </h2>
        </x-slot>
        <div class="text-gray-600" x-data="{ open: false }">



            {{-- Add Data --}}
            @if ($form_open)
                @include('registration-form')
            @endif

            @if ($form_open == false)
                @include('registration-table')
            @endif

        </div>
        {{-- </x-app-layout> --}}
        <script>
            $(document).ready(function() {
                toastr.options = {
                    progressBar: true,
                    timeOut: "2000",
                    progressBar: true,
                    positionClass: "toast-top-right",
                    closeButton: true,
                    preventDuplicates: true,
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                };
                window.addEventListener("success", (event) => {
                    toastr.success(event.detail.message);
                });
                window.addEventListener("warning", (event) => {
                    toastr.warning(event.detail.message);
                });

                window.addEventListener("info", (event) => {
                    toastr.info(event.detail.message);
                });

                window.addEventListener("error", (event) => {
                    toastr.error(event.detail.message);
                });
            });
        </script>

    </x-app-layout>

</div>
