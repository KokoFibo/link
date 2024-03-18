<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Hello {{ auth()->user()->name }},
                </div>
                @if (getLink(auth()->user()->id))
                    <div class=p-4>
                        <a href="{{ getLink(auth()->user()->id) }}" target="_blank"><button
                                class="bg-purple-500 text-white px-4 py-2 rounded-3xl shadow">visit your digital business
                                card</button></a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
