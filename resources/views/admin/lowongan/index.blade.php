<x-app-layout>
    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di Kelola lowongan</h1>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mb-3">
            <a href="{{ route('admin.lowongan.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Lowongan</a>
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
                        Available
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Closed
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody x-data="{ lowongans: {{ $lowongans->toJson() }} }">
                <template x-for="lowongan in lowongans" :key="lowongan.id">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th x-text="lowongan.judul" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td x-text="lowongan.deskripsi" class="px-6 py-4"></td>
                        <td x-text="lowongan.posisi" class="px-6 py-4"></td>
                        <td x-text="lowongan.tgl_open"class="px-6 py-4"></td>
                        <td x-text="lowongan.tgl_closed"class="px-6 py-4"></td>
                        <td class="px-6 py-4">
                            <a :href="`lowongan/${lowongan.id}/edit`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            |
                            <form :action="`lowongan/${lowongan.id}`" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

</x-app-layout>
