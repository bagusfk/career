<x-app-layout>

    <div class="max-w-3xl mx-auto p-6 lg:p-8">
        <form action="{{ route('penerimaan.update', $lamaran->id) }}" method="POST" class="flex flex-row" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-text-input id="feedback" class="block mx-4 w-full" type="text" name="feedback" :value="old('feedback', $lamaran->feedback)" placeholder="Masukan alasan kenapa pelamar tidak lulus / gagal" required />
            <input type="hidden" name='status' value="failed">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim Feedback</button>
        </form>
    </div>
</x-app-layout>
