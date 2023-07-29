<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User guide') }}
        </h2>
    </x-slot>

    <div class="hidden md:flex max-w-full">
        <img src="assets/img/user_guide2.jpg" alt="user guide">
    </div>
    <div class="max-w-full md:hidden">
        <img src="assets/img/user_guide.jpg" alt="user guide">
    </div>
    <div class="py-8 lg:p-16 max-w-screen-xl px-4 mx-auto">
        <h2 class="mb-8 text-3xl font-extrabold text-center leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">User Guide</h2>
        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>Registrasi & Login Akun</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Registrasi:</h2>
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Akses halaman Registrasi pada navigasi.</li>
                            <li>Isi formulir registrasi dengan lengkap, termasuk nama, email, password, dan informasi lain yang diminta.</li>
                            <li>Klik tombol "Daftar" atau "Register" untuk mendaftarkan akun.</li>
                        </ol>
                    </ul>
                    <h2 class="my-2 text-lg font-semibold text-gray-900 dark:text-white">Login:</h2>
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Akses halaman Login pada navigasi.</li>
                            <li>Masukkan email dan password yang telah didaftarkan saat registrasi.</li>
                            <li>Klik tombol "Login" untuk masuk ke akun.</li>
                        </ol>
                    </ul>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>Melengkapi Profile & Dokumen</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Melengkapi Profile:</h2>
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Setelah berhasil login, akses halaman profil pengguna lewat dropdown pada kanan atas.</li>
                            <li>Isi atau lengkapi informasi pada profil, seperti nomor telepon, alamat, tanggal lahir, jenis kelamin, dan lainnya.</li>
                            <li>Pastikan semua informasi telah diisi dengan lengkap dan benar.</li>
                            <li>Klik tombol "simpan"</li>
                        </ol>
                    </ul>
                    <h2 class="my-2 text-lg font-semibold text-gray-900 dark:text-white">Melengkapi Dokumen:</h2>
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Setelah berhasil login, akses halaman Dokumen lewat dropdown pada kanan atas.</li>
                            <li>Unggah file-file yang diperlukan, seperti CV, transkrip nilai, ijazah, dan profiling file lainnya.</li>
                            <li>untuk profiling file anda dapat mengunduh template yang tertera di halaman Dokumen</li>
                            <li>Pastikan file-file yang diunggah dalam format yang sesuai (misalnya PDF untuk CV dan transkrip nilai,serta ijasah, dan xlsx untuk profiling file</li>
                            <li>Klik tombol "Unggah"</li>
                        </ol>
                    </ul>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                    <span>Memilih & Melihat detail lowongan yang akan dilamar</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Akses halaman daftar lowongan magang yang tersedia.</li>
                            <li>Pilih lowongan yang sesuai dengan minat dan kualifikasi.</li>
                            <li>Klik salah satu lamaran, Anda akan diarahkan ke halaman detail lowongan magang yang dipilih.</li>
                            <li>Baca informasi dan deskripsi lowongan dengan seksama untuk memahami persyaratan dan tanggung jawab.</li>
                        </ol>
                    </ul>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-4">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                    <span>Mengirim Lamaran</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <h2 class="my-2 text-lg font-semibold text-gray-900 dark:text-white">Meninjau Kembali Kelengkapan Data Profile dan Dokumen:</h2>
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>setelah anda membaca informasi dan deskripsi lowongan dengan seksama serta memahami persyaratan dan tanggung jawab.</li>
                            <li>klik "kirim lamaran", Anda akan diarahkan ke halaman pemeriksaan profile dan dokumen.</li>
                            <li>Periksa kembali kelengkapan data pada profil dan dokumen yang diunggah.</li>
                            <li>Jika data profil dan dokumen telah lengkap dan sesuai, klik tombol "Kirim Lamaran" atau "Submit Application".</li>
                            <li>Proses lamaran akan segera dilakukan.</li>
                        </ol>
                    </ul>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-5">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-5" aria-expanded="false" aria-controls="accordion-collapse-body-5">
                    <span>Melihat Detail Progress Lamaran</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Setelah mengajukan lamaran, Anda akan diarahkan kembali ke halaman "Lowongan".</li>
                            <li>Klik lamaran yang telah diajukan untuk melihat detail progress lamaran.</li>
                            <li>Periksa secara berkala untuk melihat update status lamaran, hingga muncul hasil dari tahapan seleksi.</li>
                        </ol>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
