<x-layouts.app>
    @if($project->is_private && !Auth::check())
        <div class="p-10"></div>
        <div class="container max-w-screen-xl mx-auto p-32 bg-white rounded-lg">
            <div class="flex flex-col items-center">
                <svg class="w-32 h-32 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                </svg>
                <p class="mt-10 text-xl">
                    Sorry! this is a private project. Only the project members can access.
                </p>
            </div>
        </div>
    @elseif($project->is_private && Auth::check() && $project->isNotMember(Auth::user()))
        <div class="p-10"></div>
        <div class="container max-w-screen-xl mx-auto p-32 bg-white rounded-lg">
            <div class="flex flex-col items-center">
                <svg class="w-32 h-32 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                </svg>
                <p class="mt-10 text-xl">
                    Sorry! this is a private project. Only the project members can access.
                </p>
            </div>
        </div>
    @else
        <div class="container max-w-screen-xl mx-auto p-10 bg-white rounded-lg">
            <div class="grid grid-cols-5">
                <div class="me-8 hidden lg:block">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                  d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <a href="{{ route('projects.mine') }}" class="ms-2 hover:text-purple-700">My Projects</a>
                    </div>
                    <div class="my-4">
                        {{ $qrcode }}
                    </div>
                    <hr class="my-4">
                    <div class="mt-2 font-bold">Initiator:</div>
                    <div>{{ $project->initiator }}</div>
                    @if($project->is_team)
                        <hr class="my-4">
                        <div>
                            @include('projects._team')
                        </div>
                    @endif
                    <hr class="my-4">
                    <div>
                        <div class="font-bold">Created By</div>
                        <div>{{ $project->user->name }}</div>
                    </div>
                    <hr class="my-4">
                    <div>
                        <div class="font-bold">Created At</div>
                        <div>{{ $project->created_at->format('F jS, Y') }}</div>
                    </div>
                    <hr class="my-4">
                    <div>
                        <div class="font-bold">Progress: {{ $project->progress }}%</div>
                    </div>
                    <hr class="my-4">
                    <div>
                        @include('projects._tools')
                    </div>
                    <hr class="my-4">
                    <div>
                        @include('projects._operation')
                    </div>
                </div>
                <div class="col-span-5 lg:col-span-3">
                    <div>
                        <h1 class="text-4xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl">
                            @if($project->is_private)
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                            <span>{{ $project->title }}</span>
                        </h1>
                        <p class="mb-5 text-sm font-normal text-gray-500 lg:text-lg">
                            {{ $project->user->name }} /
                            {{ $project->initiator }} /
                            {{ $project->created_at->format('F jS, Y') }}
                        </p>
                    </div>

                    @if($project->slides->isNotEmpty())
                        <div class="w-full flex flex-row-reverse">
                            <a href="{{ route('projects.slides.index', $project) }}" class="w-full text-right">
                                <span class="py-1 px-2 bg-gray-100 rounded-md">Display</span>
                            </a>
                        </div>
                        @include('projects._slides')
                    @else
                        <img src="{{ asset('img.png') }}" alt="">
                    @endif

                    <div class="mt-5">
                        <div class="font-bold mb-2">Project Description:</div>
                        <div>{{ $project->detail }}</div>
                    </div>

                    @if($project->images->isNotEmpty())
                        <hr class="my-8">
                        <div class="mt-5">
                            <div class="font-bold mb-2">Project Images:</div>
                            <div>
                                @foreach($project->images as $image)
                                    <img src="{{ Str::startsWith($image->image, 'http') ? $image->image : asset($image->image) }}" class="mt-2 rounded-xl" alt="">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($project->links->isNotEmpty())
                        <hr class="my-8">
                        <div class="mt-5">
                            <div class="font-bold mb-2">Resources Links:</div>
                            <ul class="max-w-xl space-y-1 text-gray-500 list-inside">
                                @foreach($project->links as $link)
                                    <li class="flex items-center">
                                        <span class="flex w-3 h-3 me-3 bg-teal-500 rounded-full"></span>
                                        <a href="{{ $link->link }}" target="_blank"
                                           class="hover:text-purple-700">{{ $link->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($project->materials->isNotEmpty())
                        <hr class="my-6">
                        <div>
                            <div>Uploaded Materials:</div>
                            <div></div>
                        </div>
                    @endif

                    <hr class="my-6">
                    <div>
                        <div class="font-bold mb-2">Comments:</div>
                        @include('projects._comments')
                    </div>

                </div>
                <div class="ms-8 hidden lg:block">
                    @if($project->events->isNotEmpty())
                        <ol class="relative border-s border-gray-200">
                            @foreach($project->events as $event)
                                <li class="mb-10 ms-6">
                                <span class="absolute flex items-center justify-center w-6 h-6 bg-purple-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-purple-900">
                                    <svg class="w-2.5 h-2.5 text-purple-800 dark:text-purple-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </span>
                                    @if($loop->first)
                                        <div class="mb-1">
                                            <span class="bg-purple-300 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">Latest</span>
                                        </div>
                                    @endif
                                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                        {{ $event->when->format('F Y') }}
                                    </time>
                                    <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $event->event }}
                                    </h3>
                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to
                                        over 20+
                                        {{ $event->summary }}
                                    </p>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </div>
            </div>
        </div>
    @endif
</x-layouts.app>
