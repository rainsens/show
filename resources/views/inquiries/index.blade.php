<x-layouts.app>
    <div class="container p-10 max-w-screen-xl mx-auto bg-white rounded-lg shadow">

        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" type="button" class="mb-5 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-gray-900 bg-white rounded-full hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 text-purple-700 me-2">
                    <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg>
                Go Back
            </a>
            <a href="{{ route('inquiries.create') }}" type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2">
                Have a question
            </a>
        </div>

        <hr>

        <div class="p-6 w-full sm:p-8 lg:p-10">
            @foreach($inquiries as $inquiry)
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-900">
                        {{ $inquiry->question }}
                    </label>
                    <textarea rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500" disabled readonly>{{ $inquiry->answer ? $inquiry->answer : "Waiting for an answer..." }}</textarea>
                    @if(Auth::id() === 1)
                        <div class="flex justify-end mt-2">
                            <a href="{{ route('inquiries.edit', $inquiry) }}" type="button" class="py-2.5 px-5 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Answer</a>
                        </div>
                    @endif
                </div>
            @endforeach
            {{ $inquiries->links() }}
        </div>

    </div>
</x-layouts.app>
