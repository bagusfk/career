<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Kelola Interviewer</h1>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mb-3">
            <a href="{{ route('interviewers.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Interviewer</a>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interviewers as $row)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $row->name }}</th>
                        <td class="px-6 py-4">{{ $row->email }}</td>
                        <td class="px-6 py-4">{{ $row->role }}</td>
                        <td class="px-6 py-4">
                            {{-- <a href="{{ route('lowongan.show', $lowongan->id) }}">show</a>| --}}
                                {{-- <a href="{{ route('lowongan.edit', $lowongan->id) }}">edit</a>|
                            <form method="post" action="{{ route('lowongan.destroy', $lowongan->id) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">DELETE</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</x-app-layout>
