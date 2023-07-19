<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiles & Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Document Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your Document information.") }}
                        </p>
                    </header>
                    <form method="post" action="{{ route('berkas.update', $databerkas->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="my-8">
                            <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white" for="file_input">Curiculum Vitae<span class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> - (Pdf File (MAX 2MB))</span></label>
                            <input name="cv" accept=".pdf" class="block max-w-6xl text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" value="{{$databerkas->cv}}">
                            @if($databerkas->cv)
                                <div class="my-4">
                                    <a href="{{url('storage/Files/'.$databerkas->cv)}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{$databerkas->cv}}</a>
                                </div>
                            @endif
                        </div>

                        <div class="my-8">
                            <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white" for="file_input">Transkip<span class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> - (Pdf File (MAX 2MB))</span></label>
                            <input name="transkip" accept=".pdf" class="block max-w-6xl text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" value="{{$databerkas->transkip}}">
                            @if($databerkas->transkip)
                                <div class="my-4">
                                    <a href="{{url('storage/Files/'.$databerkas->transkip)}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{$databerkas->transkip}}</a>
                                </div>
                            @endif
                        </div>

                        <div class="my-8">
                            <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white" for="file_input">Ijazah<span class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> - (Pdf File (MAX 2MB))</span></label>
                            <input name="ijazah" accept=".pdf" class="block max-w-6xl text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" value="{{$databerkas->ijazah}}">
                            @if($databerkas->ijazah)
                                <div class="my-4">
                                    <a href="{{url('storage/Files/'.$databerkas->ijazah)}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{$databerkas->ijazah}}</a>
                                </div>
                            @endif
                        </div>

                        <div class="my-8">
                            <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white" for="file_input">Profiling File<span class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> - (Excel File (MAX 2MB))</span></label>
                            <input name="profiling" accept=".xlsx" class="block max-w-6xl text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" value="{{$databerkas->profiling}}">
                            @if($databerkas->profiling)
                                <div class="my-4">
                                    <a href="{{url('storage/Files/'.$databerkas->profiling)}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{$databerkas->profiling}}</a>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-500 mt-8 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
