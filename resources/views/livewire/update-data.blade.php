<div>
    {{-- <title>Registration</title> --}}
    {{-- <livewire:NavbarMenu /> --}}
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Update Data') }}
            </h2>
        </x-slot>
        <main class="text-gray-600 pb-10">
            @include('registration-form-update-for-user')
        </main>
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
        <script>
            $('#description').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });
        </script>
    </x-app-layout>


</div>
