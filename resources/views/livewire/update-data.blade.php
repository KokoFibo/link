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
        @push('scripts')
            {{-- <script>
                ClassicEditor.editorConfig = function(config) {
                    config.removePlugins = 'uploadImage';
                }
            </script> --}}
            {{-- referensi remove toolbar https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html --}}
            <script>
                ClassicEditor
                    .create(document.querySelector('#description'), {
                        toolbar: {
                            items: [
                                'undo', 'redo',
                                '|', 'bold', 'italic', 'blockQuote',
                            ],
                            shouldNotGroupWhenFull: false
                        }
                    })
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            @this.set('description', editor.getData());
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endpush
    </x-app-layout>


</div>
