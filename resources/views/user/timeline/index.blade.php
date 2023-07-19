<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lamaran') }}
        </h2>
    </x-slot>

    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di List lamaran saya</h1>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        posisi
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
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->lowongan->judul }} - {{ $row->profile->user->name }}
                        </th>
                        <td class="px-6 py-4">{{ $row->lowongan->posisi }}</td>
                        <td class="px-6 py-4">{{ $row->status }}</td>
                        <td class="px-6 py-4">
                            @if ($row->status === 'interview')
                                @foreach ($interviews as $interview)
                                    @if ($interview->lamaran_id === $row->id)
                                    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="inline-flex m-1 items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    detail interview ke - {{ $loop->iteration }}->
                                    <a href="{{ $interview->link }}">{{ $interview->link }}</a>
                                    </button>
                                    @endif
                                @endforeach
                            @endif

                            @if ($row->status === 'test')
                                |<a href="{{ url('storage/Files/'.$row->lowongan->file_test) }}" download>Download File Test</a>|
                                @foreach ($answers as $item)
                                    @if ($item->id===$row->id)
                                        <h5>{{$item->file_url}}</h5>
                                        <form action="{{ route('answer.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" value="{{old('file_test',$item->file_url)}}" name="file_url" id="file_url" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                            <x-primary-button class="ml-4">
                                                {{ __('Kirim') }}
                                            </x-primary-button>
                                        </form>
                                    @endif
                                @endforeach
                            @endif

                            @if($row->status === 'failed')
                                <h5>{{$row->feedback}}</h5>
                            @endif

                            @if($row->status === 'hired')
                                <h5>Omedeto anda ketrima sebagai {{$row->lowongan->posisi}}</h5>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</x-app-layout>
