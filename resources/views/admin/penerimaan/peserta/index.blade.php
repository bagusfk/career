<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Kelola Peserta</h1>

    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mb-3">
            <a href="{{ route('peserta.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Export Data Peserta</a>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Posisi
                </th>
                <th scope="col" class="px-6 py-3">
                    Details
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($lamarans as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $row->profile->user->name }}</th>
                    <td class="px-6 py-4">{{ $row->profile->user->status_user }}</td>
                    <td class="px-6 py-4">{{ $row->lowongan->posisi}}</td>
                    <td class="flex px-6 py-4 mx-auto">Details</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
