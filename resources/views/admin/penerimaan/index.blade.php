<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Kelola penerimaan</h1>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Pelamar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Posisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lamarans as $row)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $row->profile->user->name }}</th>
                        <td class="px-6 py-4">{{ $row->lowongan->posisi }}</td>
                        <td class="px-6 py-4">
                            {{-- <span id="status_{ $row->id }}">
                                {{ $row->status }}
                            </span> --}}
                            <form action="{{ route('penerimaan.update', $row->id) }}" method="POST" class="flex flex-row">
                                @csrf
                                @method('PUT')
                                <select  name="status" id="underline_select" class="block py-2.5 px-0 w-sm text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option value="pemberkasan" {{ $row->status === 'pemberkasan' ? 'selected' : '' }}>pemberkasan</option>
                                    <option value="test" {{ $row->status === 'test' ? 'selected' : '' }}>test</option>
                                    <option value="interview" {{ $row->status === 'interview' ? 'selected' : '' }}>interview</option>
                                    <option value="hired" {{ $row->status === 'hired' ? 'selected' : '' }}>hired</option>
                                    <option value="failed" {{ $row->status === 'failed' ? 'selected' : '' }}>filed</option>
                                    <option value="blacklist" {{ $row->status === 'blacklist' ? 'selected' : '' }}>blacklist</option>
                                </select>
                                <div class="">
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                                </div>
                            </form>
                        </td>
                        <td class="flex px-6 py-4 mx-auto">
                            @if ($row->status === 'test')
                                @foreach ($answers as $item)
                                    @if ($item->lamaran->id === $row->id)
                                        <a href="{{url('storage/Files/'.$item->file_url)}}">
                                            {{$item->file_url}}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                            @if ($row->status === 'interview')
                                <a href="{{ route('interview.create', $row->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Kelola Jadwal Interview
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            @endif
                            @if ($row->status === 'hired')
                            <form action="{{ route('penerimaan.store', $row->id) }}" method="POST" class="flex flex-row">
                                @csrf
                                @method('PUT')
                                <input type="text" name="feedback">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">kirim feedback</button>
                            </form>
                            @endif

                            {{-- <a href="{{ route('penerimaan.show', $row->id) }}" class="border border-primary px-4 py-2 rounded-md mr-2 hover:bg-primary-500 hover:text-white">Detail</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</x-app-layout>
