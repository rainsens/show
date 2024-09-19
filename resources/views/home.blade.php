<x-layouts.app>

    <livewire:jumbotron/>

    <div class="max-w-screen-xl mx-auto p-8 border-2 border-white rounded-xl">

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($projects as $project)
                <div class="max-w-sm bg-gray-100 p-2 rounded-lg shadow hover:bg-white">
                    <a href="{{ route('projects.show', $project->id) }}">
                        <img class="rounded-t-lg" src="{{ Str::startsWith($project->cover, 'http') ? $project->cover : asset($project->cover) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('projects.show', $project->id) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ $project->title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ $project->brief }}
                        </p>
                        <a href="{{ route('projects.show', $project->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    <div class="max-w-screen-xl mx-auto mt-20">
        <div class="mb-10 flex items-center justify-center">
            <h1 class="font-bold text-3xl text-center">
                Frequently asked questions
            </h1>
            <a href="{{ route('inquiries.index') }}" class="ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div id="accordion-open" data-accordion="open" class="bg-white rounded-t-xl">
            @foreach($inquiries as $inquiry)
                @if($loop->first)
                    <h2 id="accordion-open-heading-{{ $inquiry->id }}">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#accordion-open-body-{{ $inquiry->id }}" aria-expanded="true" aria-controls="accordion-open-body-{{ $inquiry->id }}">
                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                {{ $inquiry->question }}
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-{{ $inquiry->id }}" class="hidden" aria-labelledby="accordion-open-heading-{{ $inquiry->id }}">
                        <div class="p-5 border border-b-0 border-gray-200">
                            <p class="mb-2 text-gray-500">{{ $inquiry->answer }}</p>
                        </div>
                    </div>
                @elseif($loop->last)
                    <h2 id="accordion-open-heading-{{ $inquiry->id }}">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3" data-accordion-target="#accordion-open-body-{{ $inquiry->id }}" aria-expanded="false" aria-controls="accordion-open-body-{{ $inquiry->id }}">
                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                {{ $inquiry->question }}
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-{{ $inquiry->id }}" class="hidden" aria-labelledby="accordion-open-heading-{{ $inquiry->id }}">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500">
                                {{ $inquiry->answer }}
                            </p>
                        </div>
                    </div>
                @else
                    <h2 id="accordion-open-heading-{{ $inquiry->id }}">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-{{ $inquiry->id }}" aria-expanded="false" aria-controls="accordion-open-body-{{ $inquiry->id }}">
                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                {{ $inquiry->question }}
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-{{ $inquiry->id }}" class="hidden" aria-labelledby="accordion-open-heading-{{ $inquiry->id }}">
                        <div class="p-5 border border-b-0 border-gray-200">
                            <p class="mb-2 text-gray-500">
                                {{ $inquiry->question }}
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    </div>

</x-layouts.app>
