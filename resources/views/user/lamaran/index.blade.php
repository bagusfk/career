<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lamaran') }}
        </h2>
    </x-slot>

    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di List Lowongan</h1>
    <div class="flex ">
        <div class="flex flex-col lg:flex-row lg:flex-wrap gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($lowongans as $lowongan)
                <div class="max-w-sm md:w-96 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 content-between grid grid-cols-1 h-60">
                    <div>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $lowongan->judul }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $lowongan->posisi }} - {{ $lowongan->tgl_closed }}
                            </p>
                        </a>
                    </div>
                    {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $lowongan->deskripsi }}
                    </p> --}}
                    <div>
                        <a href="{{ route('lamaran.create', $lowongan->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lamar Sekarang
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</x-app-layout>
