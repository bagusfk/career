<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Create lowongan</h1>
    <div class="py-12 px-4 mx-auto max-w-screen-xl">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form method="POST" action="{{ route('lowongan.update',$lowo->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="mb-3">
                        <!-- Judul -->
                        <div>
                            <x-input-label for="title" :value="__('Judul')" />

                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="judul" :value="old('judul', $lowo->judul)" required autofocus />
                        </div>
                        <!-- Deskripsi -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea id="description" name="deskripsi" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('deskripsi', $lowo->deskripsi) }}</textarea>
                        </div>
                        <!-- Posisi -->
                        <div class="mt-4">
                            <x-input-label for="position" :value="__('Posisi')" />

                            <x-text-input id="position" class="block mt-1 w-full" type="text" name="posisi" :value="old('posisi', $lowo->posisi)" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- Upload File -->
                        <div class="mt-4">
                            <x-input-label for="file" :value="__('Upload File Test')" />

                            <x-text-input id="file" class="block mt-1 w-full" type="file" name="file_test" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Tanggal Open -->
                            <div class="mt-4">
                                <x-input-label for="tgl_open" :value="__('Tanggal Open')" />

                                <x-text-input id="tgl_open" class="block mt-1 w-full" type="date" name="tgl_open" :value="old('tgl_open', $lowo->tgl_open)" required />
                            </div>
                            <!-- Tanggal Closed -->
                            <div class="mt-4">
                                <x-input-label for="tgl_closed" :value="__('Tanggal Closed')" />

                                <x-text-input id="tgl_closed" class="block mt-1 w-full" type="date" name="tgl_closed" :value="old('tgl_closed', $lowo->tgl_closed)" required />
                            </div>
                        </div>
                    </div>
                </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>

        </div>
    </div>
</x-app-layout>
