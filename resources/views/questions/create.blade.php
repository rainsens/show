<x-layouts.app>
    <div class="flex flex-col justify-center items-center py-8 px-6 mx-auto">
        <div class="bg-white p-6 shadow-md md:rounded-lg border border-gray-100 justify-center items-center w-full rounded-lg lg:flex md:mt-0 lg:max-w-screen-lg xl:p-0">
            <div class="p-6 w-full sm:p-8 lg:p-10">
                <form method="POST" action="{{ route('questionnaires.questions.store', $questionnaire) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="question" class="block mb-2 text-sm font-medium text-gray-900">
                            Question
                        </label>
                        <input type="text" id="question" name="question" value="{{ old('question') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="Question" />
                        @error('question')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="open" value="1" class="sr-only peer" checked>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900">Is Question Open</span>
                        </label>
                    </div>
                    @error('open')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
