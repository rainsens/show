<x-layouts.app>
    <div class="flex flex-col justify-center items-center py-8 px-6 mx-auto">
        <div class="bg-white p-6 shadow-md md:rounded-lg border border-gray-100 justify-center items-center w-full rounded-lg lg:flex md:mt-0 lg:max-w-screen-lg xl:p-0">
            <div class="p-6 w-full sm:p-8 lg:p-10">
                <a href="{{ route('projects.show', $project) }}" type="button" class="mb-8 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-gray-900 bg-white rounded-full hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 text-purple-700 me-2">
                        <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                    </svg>
                    Go Back
                </a>
                <h1 class="text-xl font-bold leading-none text-gray-900 text-center">
                    Email notification to all team members
                </h1>
                <hr class="my-5">
                <h5 class="mb-10 text-xl font-bold leading-none text-gray-900">
                    Project: <span class="text-purple-700">{{ $project->title }}</span>.
                </h5>
                <form method="POST" action="{{ route('notices.send', $project) }}">
                    @csrf
                    <div class="mb-6">
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">
                            Email Notification Subject
                        </label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="Email notification subject" />
                        @error('subject')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900">
                            Email Notification Content
                        </label>
                        <textarea id="content" name="content" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500" placeholder="Write your email notification content here...">{{ old('content') }}</textarea>
                        @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
