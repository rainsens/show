<x-layouts.app>
    <div class="max-w-screen-xl mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="pt-5 text-xl font-semibold text-gray-900 sm:text-2xl">
                All Questionnaires
            </h1>
            @auth
                <a href="{{ route('questionnaires.create') }}" type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 me-2">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    New Questionnaire
                </a>
            @endauth
        </div>
        @foreach($questionnaires as $q)
            <div class="flex items-center mt-2 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="mr-5">
                    <img src="{{ Str::startsWith($q->cover, 'http') ? $q->cover : asset($q->cover) }}" alt="" class="w-52 rounded-md">
                </div>
                <div class="w-full">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('questionnaires.show', $q->id) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:text-purple-700">
                                {{ $q->title }}
                            </h5>
                        </a>
                        @if(Auth::id() === $q->user_id)
                            <a href="{{ route('questionnaires.edit', $q->id) }}" type="button" class="py-2 px-3 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                Edit
                            </a>
                        @endif
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="{{ route('questionnaires.show', $q->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                        Checkout
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
        @if($questionnaires->lastPage() > 1)
            <div class="items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
                <div class="flex">
                    {{ $questionnaires->links() }}
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
