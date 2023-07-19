<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profiles.update', $profile->id ) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <x-input-label for="title" :value="__('No Telephone')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="number" name="no_hp" :value="old('no_hp', $profile->no_hp)" required />
            </div>
            <div>
                <x-input-label for="title" :value="__('Tanggal Lahir')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="date" name="tgl_lahir" :value="old('tgl_lahir', $profile->tgl_lahir)" required/>
            </div>
            <div>
                <x-input-label for="title" :value="__('Asal Universitas')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="sekolah" :value="old('sekolah', $profile->sekolah)" required/>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                <select id="category" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="laki-laki" {{ $profile->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki - laki</option>
                    <option value="perempuan" {{ $profile->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Permpuan</option>
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea id="description" rows="5" name="alamat" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Alamat">{{ $profile->alamat}}</textarea>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Save
            </button>
        </div>
    </form>
</section>
