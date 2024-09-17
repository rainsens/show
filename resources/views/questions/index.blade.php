<x-layouts.app>
    <div class="container p-10 max-w-screen-xl mx-auto bg-white border border-gray-200 rounded-lg shadow">

        <a href="{{ route('questionnaires.show', $questionnaire) }}" type="button" class="mb-5 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-gray-900 bg-white rounded-full hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 border border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 text-purple-700 me-2">
                <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
            Go Back
        </a>

        <hr class="mb-10">

        <img src="{{ Str::startsWith($questionnaire->cover, 'http') ? $questionnaire->cover : asset($questionnaire->cover) }}" alt="" class="w-1/2 rounded-lg mx-auto">

        <div class="my-10 text-center">
            <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900">
                Noteworthy technology acquisitions 2021
            </h5>
            <p class="font-normal text-gray-700">
                Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
            </p>
        </div>

        <hr class="mt-10">

        @if($answers->isEmpty())
            <div class="p-6 w-full sm:p-8 lg:p-10">
                <h5 class="mb-5 text-xl font-bold tracking-tight text-gray-900">
                    Please submit your answers with following questions:
                </h5>
                @if($questions->isNotEmpty())
                    <form method="POST" action="{{ route('questionnaires.answers.store', $questionnaire) }}" enctype="multipart/form-data">
                        @csrf
                        @foreach($questions as $question)
                            <div class="mb-6">
                                <label for="answer{{$loop->index}}" class="block mb-2 text-sm font-medium text-gray-900">
                                    {{ $loop->index+1 . ". " . $question->question }}
                                </label>
                                <input name="question_ids[]" type="hidden" value="{{ $question->id }}">
                                <textarea id="answers{{$loop->index}}" name="answers[]" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500" placeholder="Write your precious answer here...">{{ old('answers.'.$loop->index) }}</textarea>
                                @error('answers.'.$loop->index)
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                        <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    </form>
                @endif
            </div>
        @else
            <div class="p-6 w-full sm:p-8 lg:p-10">
                <h5 class="mb-5 text-xl font-bold tracking-tight text-gray-900">
                    Answers for questionnaire: ( {{ $questionnaire->title }} ) from ( {{ Auth::user()->name }} ):
                </h5>
                @foreach($answers as $answer)
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            {{ $loop->index+1 . ". " . $answer->question->question }}
                        </label>
                        <textarea rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500" disabled readonly>{{ $answer->answer }}</textarea>
                    </div>
                @endforeach
            </div>
        @endif


    </div>
</x-layouts.app>
