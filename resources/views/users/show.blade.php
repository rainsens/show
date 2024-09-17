<x-layouts.app>
    <div class="max-w-screen-lg flex flex-col justify-center items-center py-8 px-6 mx-auto md:h-screen">
        <form class="w-full p-10 bg-white rounded-lg">
            <div class="w-full border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                    </button>
                    <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('users.edit', $user->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Edit
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    @if($user->avatar)
                        <img src="{{ Str::startsWith($user->avatar, 'http') ? $user->avatar : asset($user->avatar) }}" class="w-32 h-32 mr-2 rounded-full" alt="">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-20 fill-purple-300">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 0 0-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634Zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 0 1-.189-.866c0-.298.059-.605.189-.866Zm2.023 6.828a.75.75 0 1 0-1.06-1.06 3.75 3.75 0 0 1-5.304 0 .75.75 0 0 0-1.06 1.06 5.25 5.25 0 0 0 7.424 0Z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <h5 class="mb-1 text-xl font-medium text-gray-900">
                        <span>{{ $user->name }}</span>
                        <a type="button" href="{{ route('users.edit', $user->id) }}" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-xs px-3 py-1 text-center me-2 mb-2">
                            Edit
                        </a>
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        Title: {{ $user->title ?? 'Nothing left' }}
                    </span>
                </div>
            </div>
            <div class="mb-6 mt-10">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    User name
                </label>
                <input type="text" disabled id="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="{{ $user->name }}" />
            </div>
            <div class="mb-6 mt-10">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Email address
                </label>
                <input type="email" disabled id="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="{{ $user->email }}" />
            </div>
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Title
                </label>
                <input type="text" id="title" disabled
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="{{ $user->title }}" />
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Address
                </label>
                <input type="text" id="address" disabled
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="{{ $user->address }}" />
            </div>
            <div class="mb-6">
                <label for="social" class="block mb-2 text-sm font-medium text-gray-900">
                    Social media
                </label>
                <input type="text" id="social" disabled
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Social media" />
            </div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" {{ $user->isAdmin ? 'checked' : '' }} disabled readonly>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Is Admin User</span>
            </label>
        </form>
    </div>
</x-layouts.app>
