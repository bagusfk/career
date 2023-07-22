<div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white p-8 rounded-lg shadow-lg"> <!-- Ubah ukuran modal dengan kelas "w-96" -->
        <h2 class="text-xl font-bold mb-4">Ini Modal</h2>
        <p>{{$row->link}}</p>
        <div class="mt-4 flex justify-end">
            <button @click="open = false" type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500">
                Tutup
            </button>
        </div>
    </div>
</div>
