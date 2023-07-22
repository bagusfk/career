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
{{--            @foreach ($jadwal as $row) @endforeach--}}
            @if($jadwal->where('feedback','=', null)->count() === 0)
                <hr class="h-px my-8 bg-gray-500 border-0 dark:bg-gray-700" >
                <p class="mb-3 text-md font-normal text-gray-700 dark:text-gray-400">jika interviewer sudah melakukan interview dan memberikan feedback anda dapat memutuskan pelamar diterima atau tidak (jika hasil interview dirasa kurang, anda dapat membuat jadwal interview selanjutnya) :</p>
                <div class="grid grid-cols-2 gap-4 mx-auto">
                    <form action="{{ route('penerimaan.update', $interview->id) }}" method="POST" class="flex flex-row" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-text-input type="hidden" id="feedback" class="block mx-4 w-full" name="feedback" :value="old('feedback', $interview->feedback)"/>
                        <input type="hidden" name='status' value="hired">
                        <input type="hidden" name='status_user' value="peserta">
                        <button type="submit" class="w-full text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Hired</button>
                    </form>
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Failed
                        </button>
                        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click.away="open = false">
                            <div class="bg-white p-4">
                                <h2>Feed back</h2>
                                <form action="{{ route('penerimaan.update', $interview->id) }}" method="POST" class="flex flex-row" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex justify-between mt-4">
                                        <x-text-input id="feedback" class="block mx-4 w-full" type="text" name="feedback" :value="old('feedback', $interview->feedback)" placeholder="Masukan alasan kenapa pelamar tidak lulus / gagal" required />
                                        <input type="hidden" name='status' value="failed">
                                        <input type="hidden" name='status_user' value="calon peserta">
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
                                        <button type="button" @click="open = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Blacklist--}}
                <div x-data="{ open: false }">
                    <button @click="open = true" class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Failed & Blacklist Pelamar
                    </button>
                    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click.away="open = false">
                        <div class="bg-white p-4">
                            <h2>Feedback Filed</h2>
                            <form action="{{ route('penerimaan.update', $interview->id) }}" method="POST" class="flex flex-row" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="flex justify-between mt-4">
                                    <x-text-input id="feedback" class="block mx-4 w-full" type="text" name="feedback" :value="old('feedback', $interview->feedback)" placeholder="Masukan alasan kenapa pelamar tidak lulus / gagal" required />
                                    <input type="hidden" name='status' value="failed">
                                    <input type="hidden" name='status_user' value="blacklist">
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
                                    <button type="button" @click="open = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <hr class="h-px my-8 bg-gray-500 border-0 dark:bg-gray-700" >
            <h3 class="mb-4 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Jadwal Interview</h3>
            {{--jadwal interview--}}
            @foreach ($jadwal as $row)
                <div class="w-full my-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @if ($row->feedback === null)
                        <div x-data="{ open : false }" class="flex justify-end px-4"">
                            <div x-show="open" class="fixed inset-0 bg-black opacity-50 z-40"></div>
                            <button @click=" open = true " class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white rounded-lg">Edit</button>
                            <div class="fixed inset-0 flex items-center justify-center z-50" x-show="open">
                                <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg w-fit">
                                    <div class="mt-4 flex justify-end">
                                        <h2 class="text-xl font-bold mb-4">{{$row->id}}</h2>
                                        <button class="ml-2 border-2 border-gray-300 hover:bg-gray-400 text-gray-300 hover:text-gray-800 font-bold py-2 px-4 rounded mr-2" @click="open = false">
                                            X
                                        </button>
                                    </div>
                                    <form action="{{ route('interview.update', $row->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                            <div class="sm:col-span-2">
                                                <label for="type" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Judul Interview</label>
                                                <x-text-input id="type" class="block mt-1 w-full dark:placeholder-gray-400" type="text" name="type" required autofocus autocomplete="type" placeholder="Topic of Conversation" value="{{$row->type}}"/>
                                            </div>
                                            <div class="w-full">
                                                <label for="tgl_interview" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Tanggal of Interview</label>
                                                <x-text-input id="tgl_interview" class="block mt-1 w-full " type="datetime-local" name="tgl_interview" required autofocus value="{{$row->tgl_interview}}"/>
                                            </div>
                                            <div class="w-full">
                                                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Interviewer</label>
                                                <select id="interviewer" name="user_id" class="block w-full py-2.5 px-0 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-500 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-300 peer" required>
                                                    <option value="" disabled selected>-- Pilih Interviewer--</option>
                                                    @foreach($interviewers as $interviewer)
                                                        <option value="{{ $interviewer->id}}"{{ $interviewer->id === $row->user_id ? 'selected' : '' }}>{{ $interviewer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="description" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Link</label>
                                                <textarea id="description" name="link" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your link">{{$row->link}}</textarea>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex justify-end">
                                            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                                Update Jadwal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

{{--                            <a href="{{route('interview.editJadwal', $row->id)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white rounded-lg">Edit</a>--}}
                        </div>
                    @endif
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{$row->type}}-{{$row->id}}
                    </h5>
                    <p class="mb-3 text-md font-normal text-gray-700 dark:text-gray-400">
                        interview pada {{$row->tgl_interview=date("l, j F Y")}},
                        jam {{$row->tgl_interview=date("H:i a")}}
                        <br>Oleh Bapak/Ibu {{$row->user->name}}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        link : <a href="{{$row->link}}">{{$row->link}}</a>
                    </p>
                    @if ($row->feedback != null)
                        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Lihat Feedback
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button>
                          <!-- Main modal -->
                        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h5 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Feedback {{$row->type}}
                                        </h5>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-white">
                                        Interviewer : {{$row->user->name}}-{{$row->id}}
                                        </p>
                                        <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">
                                        Feedback : <br> {{$row->feedback}}
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <button disabled  class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg">
                            Belum ada Feedback
                        </button>
                    @endif
                </div>
            @endforeach
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
                        <x-text-input id="tgl_interview" class="block mt-1 w-full " type="datetime-local" name="tgl_interview" required autofocus />
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
