<div class="bg-white p-6 shadow-md md:rounded-lg border border-gray-100 justify-center items-center w-full rounded-lg lg:flex md:mt-0 lg:max-w-screen-lg xl:p-0">
    <div class="p-6 w-full sm:p-8 lg:p-10">
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="initiator" class="block mb-2 text-sm font-medium text-gray-900">
                    Project Initiator
                </label>
                <input type="text" id="initiator" name="initiator" value="{{ old('initiator') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Initiator" />
                @error('initiator')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                    Project Cover
                </label>
                <input id="cover" name="cover" type="file"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                       cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" />
                @error('cover')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    Project Title
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Title" />
                @error('title')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                    Project Brief
                </label>
                <textarea id="brief" name="brief" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                          border border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                          placeholder="Write your project brief here...">{{ old('brief') }}</textarea>
                @error('brief')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="detail" class="block mb-2 text-sm font-medium text-gray-900">
                    Project Detail
                </label>
                <textarea id="detail" rows="8" name="detail"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                          border border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                          placeholder="Write your project details here...">{{ old('detail') }}</textarea>
                @error('detail')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative mb-6">
                <label for="progress" class="block mb-2 text-sm font-medium text-gray-900">
                    Project Progress
                </label>
                <input id="progress" name="progress" type="range" value="{{ old('progress') ?? 50 }}" min="0" max="100" step="1"
                       class="w-full h-1 mb-6 bg-gray-200 rounded-lg appearance-none cursor-pointer range-sm">
                <span class="text-sm text-gray-500 absolute start-0 -bottom-0">0</span>
                <span class="text-sm text-gray-500 absolute end-0 -bottom-0">100</span>
                @error('progress')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="team" value="true" class="sr-only peer" checked>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900">Is Team Project</span>
                </label>
            </div>
            @error('team')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    Project Team Name
                </label>
                <input type="text" id="team_name" name="team_name" value="{{ old('team_name') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Team name" />
                @error('team_name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</div>
