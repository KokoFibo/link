@extends('layouts.app1')
@section('content')
    <title>Accel365</title>
    <div class="lg:w-1/3 w-full mx-auto">
        @if ($data != null)
            <main>
                {{-- <div x-show="open" class=" flex justify-center items-center"> --}}
                {{-- <div class="flex flex-col  items-center">

                        <div class="bg-green-600 w-full h-screen">
                            <div class="rounded-2xl border-2 p-1">
                                {{ QrCode::size(300)->eye('circle')->generate($data->link) }}
                            </div>
                        </div>
                        <button class="bg-black text-white px-4 py-2 rounded shadow" @click="open=false">Close</button>
                    </div> --}}




                <!-- Main modal -->
                <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="  w-full lg:w-1/3 max-h-full fixed bottom-0">
                        <!-- Modal content -->
                        <div class="relative bg-white pb-5 rounded-tl-3xl rounded-tr-3xl shadow dark:bg-gray-700"
                            id="animatedDiv">
                            <!-- Modal header -->
                            <div
                                class="flex items-center gap-5 justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <div class="profile-picture">
                                    @if ($data->photo_path)
                                        <img src="{{ asset('storage/' . $data->photo_path) }}" alt=""
                                            style="width: 60px" class="rounded-full" />
                                    @else
                                        <img src="{{ url('/images/pp.png') }}" alt="" style="width: 60px"
                                            class="rounded-full" />
                                    @endif
                                </div>
                                <div class="flex flex-col text-gray-600">

                                    <h3 class="text-xl font-semibold text-gray-600 dark:text-white">
                                        {{ $data->name }}
                                    </h3>
                                    <p class="text-sm ">{{ $data->title }}</p>
                                </div>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="static-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 flex justify-center">
                                <div class="pt-6">
                                    {{ QrCode::size(300)->eye('circle')->generate($data->link) }}
                                </div>
                            </div>
                            <!-- Modal footer -->
                            {{-- <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="static-modal" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                    accept</button>
                                <button data-modal-hide="static-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                            </div> --}}
                        </div>
                    </div>
                </div>







                <!-- Background Picture -->
                <div>
                    <img src="{{ url('/images/bg.png') }}" alt="" class=" w-full" style=" height: 410px" />
                </div>

                <!-- picture profile -->

                <div class=" flex  -mt-7  p-3 w-full justify-between items-end">
                    <div class="flex items-end gap-3">
                        <div class="profile-picture">
                            @if ($data->photo_path)
                                <img src="{{ asset('storage/' . $data->photo_path) }}" alt="" style="width: 75px"
                                    class="rounded-full" />
                            @else
                                <img src="{{ url('/images/pp.png') }}" alt="" style="width: 75px"
                                    class="rounded-full" />
                            @endif
                        </div>
                        <div class="name-title">
                            <h5 class="font-semibold text-xl text-gray-700">{{ $data->name }}</h5>
                            <h5 class="font-semibold text-sm text-gray-500">
                                {{ $data->title }}
                            </h5>
                        </div>
                    </div>

                    <div class="barcode">
                        <button data-modal-target="static-modal" data-modal-toggle="static-modal">
                            <img src="{{ url('/images/barcode.png') }}" alt="" style="width: 50px"
                                class="rounded-2xl border-2 p-1" />
                        </button>
                    </div>
                </div>



                <!-- button whatsapp -->
                <div class="flex justify-between items-center p-4">
                    <div class="flex gap-3">
                        <a href="tel:{{ $data->mobile }}">
                            <button style="width: 45px; height: 45px" class="bg-blue-100 text-blue-500 rounded-lg">
                                <i class="fa-solid fa-phone"></i>
                            </button>
                        </a>
                        <a href="https://wa.me/{{ $data->whatsapp }}">
                            <button style="width: 45px; height: 45px"
                                class="bg-green-100 text-green-500 text-xl rounded-lg">
                                <i class="fa-brands fa-whatsapp"></i>
                            </button>
                        </a>

                        <a href="mailto:{{ $data->email }}">
                            <button style="width: 45px; height: 45px" class="bg-red-100 text-red-500 rounded-lg">
                                <i class="fa-regular fa-envelope"></i>
                            </button>
                        </a>
                        <a href="https://maps.app.goo.gl/FU5Y65VWziBBwmWU8" target="_blank">
                            <button style="width: 45px; height: 45px" class="bg-teal-100 text-teal-500 rounded-lg">
                                <i class="fa-solid fa-location-dot"></i>
                            </button>
                        </a>
                    </div>
                    <div>
                        {{-- @php
                            $arrNama = explode(' ', $data->name);

                            $nama_file = strtolower($arrNama[0]) . '-' . $data->kode_agent . '.vcf';
                        @endphp --}}
                        {{-- <a href="{{ asset('storage/photos/' . $nama_file) }}" download> --}}

                        <a href="{{ asset('storage/photos/' . nama_file($data->name, $data->kode_agent)) }}" download>
                            <span
                                class="py-3 px-4 shadow-md no-underline rounded-full bg-blue-600 text-white text-sm border-blue btn-primary hover:text-white hover:bg-blue-light focus:outline-none active:shadow-none mr-2">
                                Save Contact
                            </span>
                        </a>
                        {{-- <a href="/vcf/{{ $data->code }}">
                            <button
                                class="py-3 px-5 shadow-md no-underline rounded-full bg-blue-600 text-white text-sm border-blue btn-primary hover:text-white hover:bg-blue-light focus:outline-none active:shadow-none mr-2">
                                Save Contact
                            </button>
                        </a> --}}
                    </div>
                </div>

                <!-- Kotak 100+ clients -->
                <div class="flex border-2 justify-between gap-3 p-3 m-3 rounded-xl text-gray-600 items-center">
                    <div class="mx-auto text-center">
                        <p class="font-semibold text-xl mb-2">{{ $data->clients }}</p>
                        <p>Clients</p>
                    </div>
                    <div class="mx-auto text-center">
                        <p class="font-semibold text-xl mb-2">{{ $data->claims }}</p>
                        <p>Claims</p>
                    </div>
                    <div class="mx-auto text-center">
                        <p class="font-semibold text-xl mb-2">{{ $data->teams }}</p>
                        <p>Teams</p>
                    </div>
                </div>

                <!-- About me -->
                <div class="m-4 text-gray-600">
                    <p>{{ $data->description }}</p>
                </div>

                <!-- Profile -->
                <div class="m-3">
                    <h2 class="text-xl font-semibold mb-4 text-gray-600">Profile</h2>
                    <div class="border-2 rounded-xl">
                        <div class="m-3 p-3 text-gray-600 flex items-center gap-7">
                            <div class="flex justify-center items-center rounded-full bg-gray-100"
                                style="width: 50px; height: 50px">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div>
                                <div>Name</div>
                                <div class="text-lg font-semibold">{{ $data->name }}</div>
                            </div>
                        </div>
                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mx-7" />
                        <div class="m-3 p-3 text-gray-600 flex items-center gap-7">
                            <div class="flex justify-center items-center rounded-full bg-gray-100"
                                style="width: 50px; height: 50px">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div>Mobile</div>
                                <div class="text-lg font-semibold">{{ $data->mobile }}</div>
                            </div>
                        </div>
                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mx-7" />

                        <div class="m-3 p-3 text-gray-600 flex items-center gap-7">
                            <div class="flex justify-center items-center rounded-full bg-gray-100"
                                style="width: 50px; height: 50px">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div>
                                <div>Email</div>
                                <div class="text-lg font-semibold">{{ $data->email }}</div>
                            </div>
                        </div>
                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mx-7" />

                        <div class="m-3 p-3 text-gray-600 flex items-center gap-7">
                            <div class="flex justify-center items-center rounded-full bg-gray-100"
                                style="width: 50px; height: 50px">
                                <i class="fa-regular fa-building"></i>
                            </div>
                            <div>
                                <div>Office</div>
                                <div class="text-lg font-semibold">FPOne</div>
                                <div>Thamrin Nine Complex</div>
                                <div>Autograph Tower 28th Floor</div>
                                <div>Jl. M.H Thamrin No. 10</div>

                                <div>Jakarta Pusat - 10230</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Media -->
                <div>
                    <h3 class="text-xl font-semibold m-4 text-gray-600">Social Media</h3>
                    {{-- instagram --}}
                    @if ($data->instagram)
                        <div class="flex justify-between m-3 py-3 px-6 border-2 rounded-xl items-center">
                            <div class="flex gap-5 items-center">
                                <div style="width: 50px; height: 50px"
                                    class="border-2 rounded-xl flex justify-center items-center text-3xl bg-red-100 text-red-500">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-xl text-gray-600">Instagram</h3>
                                </div>
                            </div>
                            <div>
                                <a href="{{ $data->instagram }}">
                                    <h5 class="text-gray-500">Follow me ></h5>
                                </a>
                            </div>
                        </div>
                    @endif
                    {{-- Facebook --}}
                    @if ($data->facebook)
                        <div class="flex justify-between m-3 py-3 px-6 border-2 rounded-xl items-center">
                            <div class="flex gap-5 items-center">
                                <div style="width: 50px; height: 50px"
                                    class="border-2 rounded-xl flex justify-center items-center text-3xl bg-blue-100 text-blue-500">
                                    <i class="fa-brands fa-facebook"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-xl text-gray-600">Facebook</h3>
                                </div>
                            </div>
                            <div>
                                <a href="{{ $data->facebook }}">
                                    <h5 class="text-gray-500">Add as friend ></h5>
                                </a>
                            </div>
                        </div>
                    @endif


                    {{-- Tik Tok --}}
                    @if ($data->tiktok)
                        <div class="flex justify-between m-3 py-3 px-6 border-2 rounded-xl items-center">
                            <div class="flex gap-5 items-center">
                                <div style="width: 50px; height: 50px"
                                    class="border-2 rounded-xl flex justify-center items-center text-3xl bg-black text-red-500">
                                    <i class="fa-brands fa-tiktok"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-xl text-gray-600">Tik Tok</h3>
                                </div>
                            </div>
                            <div>
                                <a href="{{ $data->tiktok }}">
                                    <h5 class="text-gray-500">Follow Me ></h5>
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Youtube --}}
                    @if ($data->youtube)
                        <div class="flex justify-between m-3 py-3 px-6 border-2 rounded-xl items-center">
                            <div class="flex gap-5 items-center">
                                <div style="width: 50px; height: 50px"
                                    class="border-2 rounded-xl flex justify-center items-center text-3xl bg-red-100 text-red-500">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-xl text-gray-600">Youtube</h3>
                                </div>
                            </div>
                            <div>
                                <a href="{{ $data->youtube }}">
                                    <h5 class="text-gray-500">Subscribe ></h5>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
                <!-- get in touch -->
                <div>
                    <h3 class="text-xl font-semibold m-4 text-gray-600">Get in touch</h3>
                    <div class="flex justify-between m-3 py-3 px-6 border-2 rounded-xl items-center">
                        <div class="flex gap-5 items-center">
                            <div style="width: 50px; height: 50px"
                                class="border-2 rounded-xl flex justify-center items-center text-3xl bg-green-100 text-green-500">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-xl text-gray-600">Whatsapp</h3>
                            </div>
                        </div>
                        <div>
                            <a href="https://wa.me/{{ $data->whatsapp }}">
                                <h5 class="text-gray-500">Send message ></h5>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        @else
            <p>Data Not Found</p>
        @endif

        <p class="text-sm text-gray-700 text-center pt-3 pb-8 font-thin ">Copyright <span>©</span>
            Accel365
            2024
        </p>
    </div>

@endsection
