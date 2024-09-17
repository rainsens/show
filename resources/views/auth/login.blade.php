<x-layouts.app>
    <section class="mt-32">
        <div class="mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
            <div class="flex flex-col justify-center">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    We explore the unknown fields
                </h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                    Here at PDS we focus on displaying those creative and innovative ideas in a number of fields, showing the study and research fruit out across multiple devices and platforms to audiences.
                </p>
            </div>
            <div>
                <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Sign in to PDS
                    </h2>

                    <form class="mt-8 space-y-6" method="POST" action="{{ route('auth') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Your email
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700
                                   dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                   dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                   placeholder="Email address" />
                            @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Your password
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700
                                   dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                   dark:focus:ring-purple-500 dark:focus:border-purple-500" />
                            @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 sm:w-auto dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                            Login
                        </button>

                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                            Not registered yet?
                            <a href="{{ route('register') }}" class="text-purple-600 hover:underline dark:text-purple-500">
                                Create account
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
