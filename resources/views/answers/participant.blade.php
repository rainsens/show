<x-layouts.app>
    <div class="container p-10 max-w-screen-xl mx-auto bg-white border border-gray-200 rounded-lg shadow">

        <a href="{{ route('questionnaires.show', $questionnaire) }}" type="button" class="mb-5 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-gray-900 bg-white rounded-full hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 border border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 text-purple-700 me-2">
                <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
            Go Back
        </a>

        <div class="bg-purple-700 text-white text-5xl p-10 text-center">
            Questionnaire Participants
        </div>

        <div class="my-10">
            <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900">
                {{ $questionnaire->title }}
            </h5>
            <p class="font-normal text-gray-700">
                {{ $questionnaire->description }}
            </p>
        </div>

        <div class="mt-10 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    All participants to questionnaire: ({{ $questionnaire->title }})
                </h5>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($participants as $participant)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ Str::startsWith($participant->user->avatar, 'http') ? $participant->user->avatar : asset($participant->user->avatar) }}" alt="">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $participant->user->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">

                                    </p>
                                </div>
                                <a href="{{ route('questionnaires.answers.index', [$questionnaire->id, $participant->user->id]) }}" class="inline-flex items-center text-base text-gray-900 hover:text-purple-700">
                                    <span class="font-semibold">{{ $participant->count }}</span>
                                    <span class="ms-1">answers</span>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
</x-layouts.app>
