<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Interview') }}
        </h2>
    </x-slot>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Kelola Interview</h1>

    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Pelamar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Posisi Yang Dilamar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jadwal Interview
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interviews as $row)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $row->lamaran->profile->user->name }}</th>
                        <td class="px-6 py-4">{{ $row->lamaran->lowongan->posisi }}</td>
                        <td class="px-6 py-4">{{ $row->tgl_interview }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('interviewer.edit', $row->id) }}">Details</a>

                            {{-- <a href="{{ route('lowongan.show', $lowongan->id) }}">show</a>
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
