<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lamaran') }}
        </h2>
    </x-slot>

    <div class="grid max-w-screen-xl px-4 py-6 mx-auto md:gap-4 md:grid-cols-12" x-data="{tabs: 0}">
        <div class="md:col-span-4">
            {{--lamaran--}}
            @foreach($lamarans as $item)
                <a href="" class="flex flex-col items-center mb-6 h-fit py-6 bg-white rounded-2xl shadow dark:bg-gray-800 border" :class="{'bg-primary-50 border-primary-400 border-3 dark:border-primary-400':tabs==={{$item->id}},'border-gray-200 dark:border-gray-700':tabs!=={{$item->id}}}" @click.prevent="tabs = {{$item->id}}">
                    <h5 class="mb-1 text-lg font-medium text-gray-900 dark:text-white">{{$item->lowongan->judul}}</h5>
                </a>
            @endforeach
        </div>

        {{--menampilkan detail lamaran--}}
        <div class="md:col-span-8">
            {{--default details--}}
            <div class="min-h-full grid content-center p-4 mt-4 md:mt-0 lg:mt-0 sm:p-8 shadow rounded-2xl border border-dashed border-gray-800 dark:border-white" x-show="tabs === 0">
                <h5 class="text-xl text-center text- font-medium text-gray-900 dark:text-white">harap pilih salah satu lamaran untuk menampilkan detail</h5>
            </div>
            {{--detail lamaran--}}
            @foreach($lamarans as $item)
                <div class="md:mt-0 lg:mt-0" x-show="tabs === {{$item->id}}">
                    <div class="p-4 sm:p-8 mb-4 bg-white dark:bg-gray-800 shadow rounded-2xl">
                        <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{$item->lowongan->judul}}</h5>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">{{$item->lowongan->tgl_open}} - {{$item->lowongan->tgl_closed}}</p>
                    </div>
                    {{--timeline--}}
                    <div class="p-4 sm:p-8 mb-4 bg-white dark:bg-gray-800 shadow rounded-2xl">
                        <p class="text-xl font-normal text-gray-900 dark:text-white mb-6">Progress</p>
                        <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
                            <li class="flex items-center @if($item->status==='pemberkasan') text-blue-600 dark:text-blue-500 @else dark:text-gray-400 @endif space-x-2.5">
                                <span class="flex items-center justify-center w-8 h-8 border rounded-full shrink-0 @if($item->status==='pemberkasan') border-blue-600 dark:border-blue-500 @else border-gray-500 dark:border-gray-400 @endif ">1</span>
                                <span>
                                    <h3 class="font-medium leading-tight">Documents Check</h3>
                                    @if($item->status==='pemberkasan')
                                        <p class="text-sm">checking your documents</p>
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-center @if($item->status==='test') text-blue-600 dark:text-blue-500 @else dark:text-gray-400 @endif space-x-2.5">
                                <span class="flex items-center justify-center w-8 h-8 border rounded-full shrink-0 @if($item->status==='test') border-blue-600 dark:border-blue-500 @else border-gray-500 dark:border-gray-400 @endif ">2</span>
                                <span>
                                    <h3 class="font-medium leading-tight">Assessment</h3>
                                    @if($item->status==='test')
                                        <p class="text-sm">checking your Potential</p>
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-center @if($item->status==='interview') text-blue-600 dark:text-blue-500 @else dark:text-gray-400 @endif space-x-2.5">
                                <span class="flex items-center justify-center w-8 h-8 border rounded-full shrink-0 @if($item->status==='interview') border-blue-600 dark:border-blue-500 @else border-gray-500 dark:border-gray-400 @endif ">3</span>
                                <span>
                                    <h3 class="font-medium leading-tight">Interview</h3>
                                    @if($item->status==='interview')
                                        <p class="text-sm">personality & skill set</p>
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-center @if($item->status==='hired') text-blue-600 dark:text-blue-500 @else dark:text-gray-400 @endif space-x-2.5">
                                <span class="flex items-center justify-center w-8 h-8 border rounded-full shrink-0 @if($item->status==='hired') border-blue-600 dark:border-blue-500 @else border-gray-500 dark:border-gray-400 @endif ">4</span>
                                <span>
                                    <h3 class="font-medium leading-tight">Results</h3>
                                    @if($item->status==='hired')
                                        <p class="text-sm">hired or failed</p>
                                    @endif
                                </span>
                            </li>
                        </ol>
                    </div>
                    {{--pemberkasan--}}
                    @if($item->status === 'pemberkasan')
                        <div class="p-4 sm:p-8 mb-4 bg-white dark:bg-gray-800 shadow rounded-2xl">
                            <p class="text-xl font-Bold text-gray-900 dark:text-white mb-2">Documents Check</p>
                            <p class="text-xl font-normal text-gray-900 dark:text-white">Perusahaan sedang meninjau berkas lamaran kamu, berikut dokumen yang telah kamu kirimkan (klik untuk melihat file):</p>
                            <div class="my-6 flex flex-row gap-4 justify-center">
                                {{--cv document--}}
                                @if($berkas->cv)
                                    <a href="{{url('storage/Files/'.$berkas->cv)}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center center">
                                        <p class="font-bold text-gray-700 dark:text-gray-400 mb-2">Curiculum Vitae</p>
                                        <div class="flex justify-center">
                                            <svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 viewBox="0 0 303.188 303.188" xml:space="preserve">
                                    <g>
                                        <polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>
                                        <path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936
                                            c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202
                                            c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251
                                            c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594
                                            c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603
                                            c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02
                                            c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024
                                            c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387
                                            c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205
                                            c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119
                                            c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57
                                            C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041
                                            c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065
                                            c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918
                                            c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985
                                            c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993
                                            c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883
                                            c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265
                                            c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197
                                            c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z
                                             M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542
                                            c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275
                                            c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>
                                        <polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>
                                        <g>
                                            <path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643
                                                v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z
                                                 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857
                                                h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>
                                            <path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979
                                                h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324
                                                c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43
                                                C160.841,257.523,161.76,254.028,161.76,249.324z"/>
                                            <path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374
                                                L196.579,273.871L196.579,273.871z"/>
                                        </g>
                                        <polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/>
                                    </g>
                                </svg>
                                        </div>
                                    </a>
                                @else
                                    <p class="font-bold text-gray-700 dark:text-gray-400 mb-2 text-">no cv</p>
                                @endif

                                {{--transkip document--}}
                                @if($berkas->transkip)
                                    <a href="{{url('storage/Files/'.$berkas->transkip)}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center center">
                                        <p class="font-bold text-gray-700 dark:text-gray-400 mb-2">Transkip Nilai</p>
                                        <div class="flex justify-center">
                                            <svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 viewBox="0 0 303.188 303.188" xml:space="preserve">
                                    <g>
                                        <polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>
                                        <path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936
                                            c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202
                                            c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251
                                            c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594
                                            c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603
                                            c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02
                                            c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024
                                            c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387
                                            c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205
                                            c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119
                                            c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57
                                            C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041
                                            c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065
                                            c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918
                                            c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985
                                            c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993
                                            c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883
                                            c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265
                                            c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197
                                            c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z
                                             M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542
                                            c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275
                                            c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>
                                        <polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>
                                        <g>
                                            <path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643
                                                v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z
                                                 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857
                                                h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>
                                            <path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979
                                                h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324
                                                c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43
                                                C160.841,257.523,161.76,254.028,161.76,249.324z"/>
                                            <path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374
                                                L196.579,273.871L196.579,273.871z"/>
                                        </g>
                                        <polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/>
                                    </g>
                                </svg>
                                        </div>
                                    </a>
                                @else
                                    <p class="font-bold text-gray-700 dark:text-gray-400 mb-2 text-">no transkip</p>
                                @endif

                                {{--ijazah document--}}
                                @if($berkas->ijazah)
                                    <a href="{{url('storage/Files/'.$berkas->ijazah)}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center center">
                                        <p class="font-bold text-gray-700 dark:text-gray-400 mb-2">Ijazah</p>
                                        <div class="flex justify-center">
                                            <svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 viewBox="0 0 303.188 303.188" xml:space="preserve">
                                    <g>
                                        <polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>
                                        <path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936
                                            c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202
                                            c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251
                                            c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594
                                            c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603
                                            c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02
                                            c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024
                                            c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387
                                            c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205
                                            c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119
                                            c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57
                                            C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041
                                            c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065
                                            c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918
                                            c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985
                                            c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993
                                            c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883
                                            c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265
                                            c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197
                                            c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z
                                             M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542
                                            c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275
                                            c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>
                                        <polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>
                                        <g>
                                            <path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643
                                                v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z
                                                 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857
                                                h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>
                                            <path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979
                                                h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324
                                                c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43
                                                C160.841,257.523,161.76,254.028,161.76,249.324z"/>
                                            <path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374
                                                L196.579,273.871L196.579,273.871z"/>
                                        </g>
                                        <polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/>
                                    </g>
                                </svg>
                                        </div>
                                    </a>
                                @else
                                    <p class="font-bold text-gray-700 dark:text-gray-400 mb-2 text-">no ijazah</p>
                                @endif

                                {{--profiling document--}}
                                @if($berkas->profiling)
                                    <a href="{{url('storage/Files/'.$berkas->profiling)}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center center">
                                        <p class="font-bold text-gray-700 dark:text-gray-400 mb-2">Profiling file</p>
                                        <div class="flex justify-center">
                                            <svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 viewBox="0 0 303.188 303.188" xml:space="preserve">
                                                <g>
                                                    <polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>
                                                    <path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936
                                                        c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202
                                                        c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251
                                                        c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594
                                                        c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603
                                                        c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02
                                                        c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024
                                                        c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387
                                                        c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205
                                                        c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119
                                                        c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57
                                                        C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041
                                                        c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065
                                                        c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918
                                                        c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985
                                                        c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993
                                                        c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883
                                                        c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265
                                                        c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197
                                                        c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z
                                                         M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542
                                                        c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275
                                                        c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>
                                                    <polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>
                                                    <g>
                                                        <path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643
                                                            v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z
                                                             M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857
                                                            h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>
                                                        <path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979
                                                            h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324
                                                            c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43
                                                            C160.841,257.523,161.76,254.028,161.76,249.324z"/>
                                                        <path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374
                                                            L196.579,273.871L196.579,273.871z"/>
                                                    </g>
                                                    <polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                    {{--end pemberkasan--}}

                    {{--Test--}}
                    @if($item->status === 'test')
                        <div class="p-4 sm:p-8 mb-4 bg-white dark:bg-gray-800 shadow rounded-2xl">
                            <p class="text-xl font-Bold text-gray-900 dark:text-white mb-2">Documents Check</p>
                            <p class="text-xl font-normal text-gray-900 dark:text-white">Perusahaan sedang meninjau berkas lamaran kamu, berikut dokumen yang telah kamu kirimkan (klik untuk melihat file):</p>
                            
                        </div>
                        <div class="p-4 sm:p-8 mb-4 bg-white dark:bg-gray-800 shadow rounded-2xl">
                            <p class="text-xl font-Bold text-gray-900 dark:text-white mb-2">Documents Check</p>
                            <p class="text-xl font-normal text-gray-900 dark:text-white">Perusahaan sedang meninjau berkas lamaran kamu, berikut dokumen yang telah kamu kirimkan (klik untuk melihat file):</p>

                        </div>
                    @endif
                    {{--end Test--}}



                    <div class="p-4 sm:p-8 mb-4 bg-white dark:bg-gray-800 shadow rounded-2xl">
                        <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{$item->feedback}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <h1 class="py-12 text-3xl dark:text-white text-center">Halo <span>{{ Auth::user()->name }}</span> Di List lamaran saya</h1>
    <div class="relative max-w-6xl mx-auto overflow-x-auto shadow-md sm:rounded-lg -z-9">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 -z-10">
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
