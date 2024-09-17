<div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-100">
    <div class="p-5 flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                {{ $headline }}
            </h1>
        </div>

        <form class="w-1/3">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500" placeholder="Keywords..." />
                <button type="submit" class="text-white absolute end-1.5 bottom-1.5 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-2 py-1">Search</button>
            </div>
        </form>

        <div class="">
            @if(request()->routeIs('projects.index'))
                <a href="{{ route('projects.mine') }}" type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                    Check My Projects
                </a>
            @else
                <a href="{{ route('projects.create') }}" type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                    Add New Project
                </a>
            @endif

        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Project
            </th>
            <th scope="col" class="px-6 py-3">
                Initiator
            </th>
            <th scope="col" class="px-6 py-3">
                Description
            </th>
            <th scope="col" class="px-6 py-3">
                Progress
            </th>
            <th scope="col" class="px-6 py-3">
                Team
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="w-52">
                        <a href="{{ route('projects.show', $project->id) }}">
                            <img class="rounded-md" src="{{ Str::startsWith($project->cover, 'http') ? $project->cover : asset($project->cover) }}" alt="{{ $project->title }}" title="{{ $project->title }}" />
                        </a>
                    </div>
                    <div class="ps-3">
                        <div class="text-base font-semibold">
                            <a href="{{ route('projects.show', $project->id) }}" title="{{ $project->title }}">
                                {{ Str::limit($project->title, 20) }}
                            </a>
                        </div>
                        <div class="font-normal text-gray-500">{{ $project->user->name }}</div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{ $project->initiator }}
                </td>
                <td class="px-6 py-4">
                    {{ $project->brief }}
                </td>
                <td class="px-6 py-4">
                    {{ $project->progress }}%
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('projects.show', $project->id) }}" class="font-medium text-purple-600 dark:text-purple-500 hover:underline">
                        Detail
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($projects->lastPage() > 1)
        <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="flex">
                {{ $projects->links() }}
            </div>
        </div>
    @endif
</div>
