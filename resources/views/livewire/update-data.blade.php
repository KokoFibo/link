<div>
    {{-- <title>Registration</title> --}}
    {{-- <livewire:NavbarMenu /> --}}
    <x-app-layout>
        <main class="text-gray-600">
            <h1 class="text-3xl font-semibold text-center mt-5">Update Data</h1>
            @include('registration-form-update-for-user')
        </main>

    </x-app-layout>
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

</div>
