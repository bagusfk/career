<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Kelola lowongan</h1>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mb-3">
            <a href="{{ route('lowongan.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Lowongan</a>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        posisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Buka
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tutup
                    </th>
                    <th scope="col" class="px-6 py-3">
                        file
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongans as $lowongan)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $lowongan->judul }}</th>
                        <td class="px-6 py-4">{{ $lowongan->deskripsi }}</td>
                        <td class="px-6 py-4">{{ $lowongan->posisi }}</td>
                        <td class="px-6 py-4">{{ date('l, d M Y', strtotime($lowongan->tgl_open)) }}</td>
                        <td class="px-6 py-4">{{ date('l, d M Y', strtotime($lowongan->tgl_closed)) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ url('storage/Files/'.$lowongan->file_test) }}" download>
                                Download
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{-- <a href="{{ route('lowongan.show', $lowongan->id) }}">show</a>| --}}
                            <a href="{{ route('lowongan.edit', $lowongan->id) }}">edit</a>|
                            <form method="post" action="{{ route('lowongan.destroy', $lowongan->id) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</x-app-layout>
