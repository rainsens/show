<x-layouts.app>

    <livewire:jumbotron/>

    <div class="max-w-screen-xl mx-auto p-8 border-2 border-white rounded-xl">

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($projects as $project)
                <div class="max-w-sm bg-white p-2 rounded-lg shadow">
                    <a href="#">
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

</x-layouts.app>
