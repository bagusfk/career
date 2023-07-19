<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiles & Documents') }}
        </h2>
    </x-slot>

    <div class="grid max-w-screen-xl px-4 py-12 mx-auto md:gap-8 md:grid-cols-12">
        @if($profile->id)
            <div class="md:col-span-4 flex flex-col items-center h-fit py-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if($profile->image)
                    <div class="relative w-24 h-24 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <img src="/storage/Images/{{$profile->image}}" alt="{{$profile->image}}"/>
                    </div>
                @else
                    <div class="relative w-24 h-24 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-28 h-28 text-gray-400 -left-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                @endif
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{Auth::user()->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{$profile->sekolah}}</span>
                <div x-data="{ open: false }" class="mt-4">
                    <button @click="open = true" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        Edit Foto Profile
                    </button>
                    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click.away="open = false">
                        <div class="bg-white p-4">
                            <h2>Ganti Foto Profile</h2>
                            <form action="{{ route('updatePhoto.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="file" name="image" accept="image/*">
                                <div class="flex justify-between mt-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
                                    <button type="button" @click="open = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
            <div class="p-4 mt-4 md:mt-0 lg:mt-0 md:col-span-8 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('profiles.partials.update-profiles')
                </div>
            </div>
    </div>

</x-app-layout>
