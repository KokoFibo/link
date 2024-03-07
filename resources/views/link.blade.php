@extends('layouts.app1')
@section('content')
    <div>
        @if ($data != null)
            <main x-data="{ open: false }">
                <div x-show="open">
                    <div class="relative flex flex-col gap-2 items-center ">
                        <img src="{{ url('/images/barcode.png') }}" alt="" style="width: 300px"
                            class="rounded-2xl border-2 p-1" />
                        <button class="bg-black text-white px-3 py-2 close-modal" @click="open=false">Close</button>
                    </div>
                </div>
                <!-- Background Picture -->
                <div>
                    <img src="{{ url('/images/bg.png') }}" alt="" style="width: 600px; height: 410px" />
                </div>




                <!-- picture profile -->
                <div class="flex justify-between p-3 items-end -mt-7">
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
                    <div class="barcode">
                        <button @click="open = true" class="open-modal">
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
                        <a href="{{ asset('images/anton.vcf') }}" download>

                            {{-- {{ asset('storage/' . $user->photo_path) }} --}}
                            <span
                                class="py-3 px-5 shadow-md no-underline rounded-full bg-blue-600 text-white text-sm border-blue btn-primary hover:text-white hover:bg-blue-light focus:outline-none active:shadow-none mr-2">
                                Save Contact
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Kotak 100+ clients -->
                <div class="flex border-2 justify-between gap-3 p-3 m-3 rounded-xl text-xl text-gray-600">
                    <div class="mx-auto text-center">
                        <p class="font-semibold mb-1">100+</p>
                        <p>Clients</p>
                    </div>
                    <div class="mx-auto text-center">
                        <p class="font-semibold mb-2">80+</p>
                        <p>Claims</p>
                    </div>
                    <div class="mx-auto text-center">
                        <p class="font-semibold mb-2">20+</p>
                        <p>Teams</p>
                    </div>
                </div>

                <!-- About me -->
                <div class="m-4 text-gray-600">
                    <p class="mb-2">
                        Seorang Financial Planner yang sudah berlisensi dan berpengalaman di
                        industri asuransi jiwa.
                    </p>
                    <p>
                        Saya siap membantu Anda mengatur masa depan keluarga tercinta yang lebih
                        baik.
                    </p>
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
                                <div class="text-lg font-semibold">Ester Chen</div>
                            </div>
                        </div>
                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mx-7" />
                        <div class="m-3 p-3 text-gray-600 flex items-center gap-7">
                            <div class="flex justify-center items-center rounded-full bg-gray-100"
                                style="width: 50px; height: 50px">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div>Phone</div>
                                <div class="text-lg font-semibold">0878 8888 8888</div>
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
                                <div class="text-lg font-semibold">myemail@gmail.com</div>
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
                                <div>Jl. M.H. Thamrin No.10</div>

                                <div>Jakarta Pusat - 10230</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Media -->
                <div>
                    <h3 class="text-xl font-semibold m-4 text-gray-600">Social Media</h3>
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
                            <h5 class="text-gray-500">Follow me ></h5>
                        </div>
                    </div>
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
                            <h5 class="text-gray-500">Add as friend ></h5>
                        </div>
                    </div>
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
                            <h5 class="text-gray-500">Follow Me ></h5>
                        </div>
                    </div>
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
                            <h5 class="text-gray-500">Subscribe ></h5>
                        </div>
                    </div>
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
                            <h5 class="text-gray-500">Send message ></h5>
                        </div>
                    </div>
                </div>
            </main>
        @else
            <p>File Not Found</p>
        @endif

        <p class="text-sm text-gray-700 text-center pt-3 pb-8 font-thin ">Copyright <span>©</span>
            Accel365
            2024
        </p>
    </div>

@endsection
