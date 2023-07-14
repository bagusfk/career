<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Ayo buat jadwal Interview</h1>
    <div class="grid md:grid-cols-2 gap-4 max-w-7xl mx-auto">
        <div class="p-8 md:p-9">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Pelamar</h2>
            <form action="">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white"></label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interview->profile->user->name }}
                        </h5>
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Lowongan</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interview->lowongan->judul }}
                        </h5>
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interview->status }}
                        </h5>
                    </div>
                </div>
            </form>
        </div>
        <div class="p-8 md:p-9">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Jadwal Interview</h2>
            <form action="{{ route('interview.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="type" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Judul Interview</label>
                        <x-text-input id="type" class="block mt-1 w-full dark:placeholder-gray-400" type="text" name="type" required autofocus autocomplete="type" placeholder="Topic of Conversation"/>
                    </div>
                    <div class="w-full">
                        <label for="tgl_interview" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Tanggal of Interview</label>
                        <x-text-input id="tgl_interview" class="block mt-1 w-full " type="date" name="tgl_interview" required autofocus />
                    </div>
                    <div class="w-full">
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Interviewer</label>
                        <select id="interviewer" name="user_id" class="block w-full py-2.5 px-0 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-500 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-300 peer" required>
                            <option value="" disabled selected>-- Pilih Interviewer--</option>
                            @foreach($interviewers as $interviewer)
                                <option value="{{ $interviewer->id }}">{{ $interviewer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Link</label>
                        <textarea id="description" name="link" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your link"></textarea>
                    </div>
                    <input type="hidden" name="lamaran_id" value="{{ $interview->id }}">
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan Jadwal
                </button>
            </form>
        </div>
    </div>
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

</x-app-layout>
