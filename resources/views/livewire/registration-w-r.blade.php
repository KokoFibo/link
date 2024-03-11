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
