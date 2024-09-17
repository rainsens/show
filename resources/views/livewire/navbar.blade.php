<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap">PDS</span>
            </a>
            <div class="ml-5 items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="{{ route('home') }}" class="block py-2 px-3 rounded md:bg-transparent text-gray-900 @if(Str::contains(Route::currentRouteName(), 'home')) md:text-purple-700 @endif md:hover:text-purple-700 md:p-0" aria-current="page">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent @if(Str::contains(Route::currentRouteName(), 'project')) md:text-purple-700 @endif md:hover:text-purple-700 md:p-0">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('questionnaires.index') }}" class="block py-2 px-3 text-gray-900 rounded @if(Str::contains(Route::currentRouteName(), 'questionnaire')) md:text-purple-700 @endif hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">
                            Questionnaires
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth()
                <div>
                    <button id="profile" data-dropdown-toggle="user-profile" class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 md:me-0 focus:ring-4 focus:ring-gray-100" type="button">
                        <span class="sr-only">Open user menu</span>
                        @if(Auth::user()->avatar)
                            <img src="{{ Str::startsWith(Auth::user()->avatar, 'http') ? Auth::user()->avatar : asset(Auth::user()->avatar) }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                        @endif
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <div id="user-profile" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <div class="py-2 text-sm text-gray-900">
                            <div class="truncate">
                                <a href="{{ route('users.show', Auth::id()) }}" class="block px-4 py-2 hover:bg-gray-100">
                                    My profile
                                </a>
                            </div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                            <li>
                                <a href="{{ route('projects.mine') }}" class="block px-4 py-2 hover:bg-gray-100">
                                    My projects
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.edit', Auth::id()) }}" class="block px-4 py-2 hover:bg-gray-100">
                                    My settings
                                </a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pl-5">
                    <a type="button" href="{{ route('logout') }}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                        Sign out
                    </a>
                </div>
            @endauth

            @guest
                <a type="button" href="{{ route('login') }}" class="focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Sign in
                </a>
                <a type="button" href="{{ route('register') }}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Sign up
                </a>
            @endguest
        </div>
    </div>
</nav>
