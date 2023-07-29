<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Lowongan ') }}
        </h2>
    </x-slot>

    <div class="grid max-w-screen-xl px-4 py-12 mx-auto md:gap-8 md:grid-cols-12">
        <div class="p-4 mt-4 md:mt-0 lg:mt-0 md:col-span-8 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $lowongans->judul }}
            </h1>
            <p class="text-lg font-normal text-gray-700 dark:text-gray-200">
                Posisi : {{ $lowongans->posisi }}
            </p>
            <p class="text-lg font-normal text-gray-700 dark:text-gray-200">
                Pendaftaran ditutup pada : {{ date('l, d M Y', strtotime($lowongans->tgl_closed)) }}
            </p>
            <hr class="my-8 border-gray-400 dark:border-white">
            <h2 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                Deskripsi
            </h2>
            <p class="text-lg font-normal text-gray-700 dark:text-gray-200">
                {{ $lowongans->deskripsi }}
            </p>
        </div>
        <div class="md:col-span-4 h-fit p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <p class="mb-6 text-lg font-normal text-gray-700 dark:text-gray-200">
                Halo {{Auth::user()->name}} sebelum kamu melamar pastikan data yang diperlukan sudah lengkap seperti kelengkapan profile dan dokumen, jika belum lengkap silahkan lengkapi terlebih dahulu.
            </p>
            <a href="{{ route('lamaran.create', $lowongans->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Lamar Sekarang
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>

</x-app-layout>
