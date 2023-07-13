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
                            <span id="status_{ $row->id }}">
                                {{ $row->status }}
                            </span>
                        </td>
                        <td class="flex px-6 py-4 mx-auto">
                            <a href="{{ route('penerimaan.show', $row->id) }}" class="border border-primary px-4 py-2 rounded-md mr-2 hover:bg-primary-500 hover:text-white">Detail</a>
                            <a href="#" class="border border-primary px-4 py-2 rounded-md hover:bg-green-500 hover:text-white " data-toggle="modal" data-target="#editModal_{{ $row->id }}">Edit Status</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="editModal_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel_{{ $row->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel_{{ $row->id }}">Edit Status Lamaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penerimaan.update', $row->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pemberkasan" {{ $row->status === 'pemberkasan' ? 'selected' : '' }}>pemberkasan</option>
                                <option value="test" {{ $row->status === 'test' ? 'selected' : '' }}>test</option>
                                <option value="interview" {{ $row->status === 'interview' ? 'selected' : '' }}>interview</option>
                                <option value="hired" {{ $row->status === 'hired' ? 'selected' : '' }}>hired</option>
                                <option value="failed" {{ $row->status === 'failed' ? 'selected' : '' }}>filed</option>
                                <option value="blacklist" {{ $row->status === 'blacklist' ? 'selected' : '' }}>blacklist</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
