<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lowongan') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert fixed inset-0 flex items-center justify-center z-50">
            <div id="alert-4" class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function () {
                document.querySelector('.alert').remove();
            }, 3000);
        </script>
    @endif

    <div class="flex mt-16">
        <div class="flex flex-col lg:flex-row lg:flex-wrap gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($lowongans as $lowongan)
                <a href="{{route('lamaran.show', $lowongan->id)}}" class="max-w-sm md:w-96 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-60 hover:bg-gray-50 hover:dark:bg-gray-700">
                    <div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $lowongan->judul }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Posisi : {{ $lowongan->posisi }}
                        </p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Tutup pada : {{ date('l, d M Y', strtotime($lowongan->tgl_closed)) }}
                        </p>
                    </div>

                    <h2 class="mt-2 font-normal text-gray-700 dark:text-gray-400 overflow-hidden overflow-ellipsis whitespace-nowrap">
                        Deskripsi :
                    </h2>
                    <p class="font-normal text-gray-700 dark:text-gray-400 overflow-hidden overflow-ellipsis whitespace-nowrap">
                        {{ $lowongan->deskripsi }}
                    </p>
                </a>
            @endforeach

        </div>
    </div>

</x-app-layout>
