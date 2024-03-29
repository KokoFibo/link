<div class="w-full  mx-auto mt-10 p-5">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    @if (auth()->user()->role > 2)
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                    @endif

                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Agent
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mobile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Whatsapp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Instagram
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Facebook
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tik Tok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Youtube
                    </th>
                    @if (auth()->user()->role > 2)
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>

                        {{-- <th scope="col" class="px-6 py-3">
                             QR Code
                         </th> --}}
                    @endif
                    <th scope="col" class="px-6 py-3">
                        Link
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <button type="button" wire:click="addNew"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Add
                            New Data</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-4 py-2">
                            {{ $user->id }}
                        </td>

                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        @if (auth()->user()->role > 2)
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ roleName($user->role) }}
                            </th>
                        @endif
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->title }}
                        </th>
                        <td class="px-4 py-2">
                            {{ $user->email }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->kode_agent }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->mobile }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->whatsapp }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->instagram }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->facebook }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->tiktok }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->youtube }}
                        </td>
                        @if (auth()->user()->role > 2)
                            <td class="px-4 py-2">
                                {{ $user->code }}
                            </td>
                        @endif
                        <td class="px-4 py-2">
                            <a href="{{ $user->link }}" target="_blank">{{ $user->link }}</a>
                        </td>
                        <td class="px-4 py-2">
                            @if ($user->photo_path)
                                <div style="width: 50px;">
                                    <img src="{{ asset('storage/' . $user->photo_path) }}">

                                </div>
                            @else
                                <p>No Photo available</p>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-right">

                            <div class="flex gap-2">
                                <button class="bg-orange-400 text-black px-3 py-2 rounded shadow"
                                    wire:click="edit({{ $user->id }})">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-2 rounded shadow"
                                    wire:confirm="Are you sure you want to delete this post?"
                                    wire:click="delete({{ $user->id }})">Delete</button>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $users->links() }}
    </div>
    @push('scripts')
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
</div>
