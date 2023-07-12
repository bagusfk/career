<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Create lowongan</h1>
        <form method="POST" action="{{ route('lowongan.update',$lowo->first()->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <x-input-label for="title" :value="__('Judul')" />

                <x-text-input id="title" class="block mt-1 w-full" type="text" name="judul" :value="old('judul', $lowongan->judul)" required autofocus />
            </div>

            <!-- Deskripsi -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Deskripsi')" />

                <textarea id="description" name="deskripsi" rows="6" class="form-textarea block mt-1 w-full">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
            </div>

            <!-- Posisi -->
            <div class="mt-4">
                <x-input-label for="position" :value="__('Posisi')" />

                <x-text-input id="position" class="block mt-1 w-full" type="text" name="posisi" :value="old('posisi', $lowongan->posisi)" required />
            </div>

            <!-- Upload File -->
            <div class="mt-4">
                <x-input-label for="file" :value="__('Upload File Test')" />

                <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" />
            </div>

            <!-- Tanggal Open -->
            <div class="mt-4">
                <x-input-label for="tgl_open" :value="__('Tanggal Open')" />

                <x-text-input id="tgl_open" class="block mt-1 w-full" type="date" name="tgl_open" :value="old('tgl_open', $lowongan->tgl_open)" required />
            </div>

            <!-- Tanggal Closed -->
            <div class="mt-4">
                <x-input-label for="tgl_closed" :value="__('Tanggal Closed')" />

                <x-text-input id="tgl_closed" class="block mt-1 w-full" type="date" name="tgl_closed" :value="old('tgl_closed', $lowongan->tgl_closed)" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
</x-app-layout>
