<x-app-layout>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Data Pelamar</h1>
        <h5 class="py-4  dark:text-white text-center">Nama : {{$file->profile->user->name}}</h5>
        <h5 class="py-4  dark:text-white text-center">profile id : {{$file->profile->id}}</h5>
        <h5 class="py-4  dark:text-white text-center">CV : {{$file->cv}}</h5>
    </div>
</x-app-layout>
