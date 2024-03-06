<div>
    <title>Registration</title>
    {{-- <x-navbar></x-navbar> --}}
    <livewire:NavbarMenu />
    <main class="text-gray-600">
        <h1 class="text-3xl font-semibold text-center mt-5">Registration {{ $is_add }}</h1>

        {{-- Add Data --}}
        @if ($is_add || $is_edit)
            <div class="mt-10">

                <div href="#"
                    class="block w-1/3 mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">



                    <div class="max-w-md mx-auto">
                        {{-- name --}}
                        <div class="mt-5 relative z-0 w-full mb-5 group">
                            <input wire:model.live="name" type="text" name="floating_name" id="floating_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="floating_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                            <span class="text-red-500 text-xs">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        {{-- Title --}}
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model.live="title" type="text" name="floating_title" id="floating_title"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_title"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                            <span class="text-red-500 text-xs">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        {{-- Email --}}
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model.live="email" type="email" name="floating_email" id="floating_email"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_email"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                address</label>
                            <span class="text-red-500 text-xs">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        {{-- kode_agent --}}
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model.live="kode_agent" type="text" name="floating_kode_agent"
                                id="floating_kode_agent"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="floating_kode_agent"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode
                                Agent</label>
                            <span class="text-red-500 text-xs">
                                @error('kode_agent')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        {{-- mobile & Whatsapp --}}
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model.live="mobile" type="text" name="floating_mobile"
                                    id="floating_mobile"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_mobile"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mobile</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model.live="whatsapp" type="text" name="floating_whatsapp"
                                    id="floating_whatsapp"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_whatsapp"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Whatsapp</label>
                            </div>
                        </div>
                        {{-- Instagram & Facebook --}}
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model.live="instagram" type="text" name="floating_instagram"
                                    id="floating_instagram"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_instagram"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Instagram</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model.live="facebook" type="text" name="floating_facebook"
                                    id="floating_facebook"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_facebook"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Facebook</label>
                            </div>
                        </div>
                        {{-- Tik tok & Youtube --}}
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model.live="tiktok" type="text" name="floating_tiktok"
                                    id="floating_tiktok"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_tiktok"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tik
                                    Tok</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input wire:model.live="youtube" type="text" name="floating_youtube"
                                    id="floating_youtube"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="floating_youtube"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Youtube</label>
                            </div>
                        </div>
                        <div class="border-2 rounded-xl p-5 mt-5">
                            @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}">
                            @endif
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload file</label>
                            <input wire:model="photo"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG
                                (Max. 100 X 100px).</p>
                            @error('photo')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-between my-5">
                            @if ($is_add)
                                <button wire:click="save"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                <button wire:click="$set('is_add', false)"
                                    class="text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">Cancel</button>
                            @endif

                            @if ($is_edit)
                                <button wire:click="update"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>

                                <button wire:click="$set('is_edit', false)"
                                    class="text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">Cancel</button>
                            @endif

                        </div>
                    </div>

                </div>




            </div>
        @endif

        @if ($is_add == false && $is_edit == false)
            {{-- table --}}
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
                                <th scope="col" class="px-6 py-3">
                                    Code
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Link
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Photo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <button type="button" wire:click="$set('is_add', true)"
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
                                    <td class="px-4 py-2">
                                        {{ $user->code }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ $user->link }}">{{ $user->link }}</a>
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
        @endif


</div>






</main>
</div>
