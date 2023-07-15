<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Ayo lakukan Interview</h1>
    <div class="grid md:grid-cols-2 gap-4 max-w-7xl mx-auto">
        <div class="p-8 md:p-9">
            <form action="">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Topic of Conversation</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interviews->type }}
                        </h5>
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Interview</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interviews->tgl_interview}}
                        </h5>
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interviewer</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interviews->user->name}}
                        </h5>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Link Interview</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="{{ $interviews->link }}">{{ $interviews->link }}</a>
                        </h5>
                    </div>
                    <hr class="border-gray-400 dark:border-gray-600 sm:col-span-2">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Data Pelamar</h2>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white"></label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interviews->lamaran->profile->user->name }}
                        </h5>
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Melamar Sebagai</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interviews->lamaran->lowongan->posisi }}
                        </h5>
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $interviews->lamaran->status }} ke {{ $interviews->where('lamaran_id',$interviews->lamaran_id)->count() }}
                        </h5>
                    </div>
                </div>
            </form>
        </div>
        <div class="p-8 md:p-9">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Feedback Interview</h2>
            <form action="{{ route('interviewer.update',$interviews->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6" >
                    <div class="sm:col-span-2">
                        <label for="feedback" class="block mb-2 text-md font-medium text-gray-700 dark:text-gray-400">Masukan feedback setelah melakukan interview*</label>
                        <textarea id="feedback" name="feedback" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your feedback after the meeting">{{ old('feedback', $interviews->feedback) }}</textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Kirim Feedback
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
