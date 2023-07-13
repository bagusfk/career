<x-app-layout>
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Lamaran</h2>
        <form action="#">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white"></label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $penerimaan->profile->user->name }}
                    </h5>
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Posisi</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $penerimaan->lowongan->posisi }}
                    </h5>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $penerimaan->status }}
                    </h5>
                </div>
                {{-- <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Open</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $lowongan->tgl_open }}
                    </h5>
                </div>
                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Closed</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $lowongan->tgl_closed }}
                    </h5>
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here" disabled>{{ $lowongan->deskripsi }}</textarea>
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">CV</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ Auth::user()->profile->berkas->cv }}
                    </h5>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transkip</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ Auth::user()->profile->berkas->transkip }}
                    </h5>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transkip</label>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ Auth::user()->profile->berkas->ijazah }}
                    </h5>
                </div> --}}
            </div>

        </form>
        {{-- <form method="POST" action="{{ route('lamaran.store')}}">
            @csrf
            <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
            <input type="hidden" name="status" value="pemberkasan">
            <!-- Tambahkan input profile_id dengan nilai dari profil pengguna yang terautentikasi -->
            <input type="hidden" name="profile_id" value="{{ Auth::user()->profile->id }}">

            <!-- Tambahkan input lain sesuai kebutuhan -->
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Ajukan Lamaran
            </button>
        </form> --}}

    </div>
</x-app-layout>
