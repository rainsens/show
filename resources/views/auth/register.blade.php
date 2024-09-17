<x-layouts.app>
    <div class="flex justify-center items-center mt-40">
        <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        User name
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500
                           focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                           dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="User name" />
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email address
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500
                           focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                           dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Email address" />
                    @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>
                    <input type="password" id="password" name="password"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500
                           focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                           dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="•••••••••" />
                    @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Confirm password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500
                           focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                           dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="•••••••••" />
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="agree" name="agree" type="checkbox" value="1"
                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-purple-300
                               dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:ring-offset-gray-800" />
                    </div>
                    <label for="agree" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        I agree with the
                        <a href="#" class="text-purple-600 hover:underline dark:text-purple-500">
                            terms and conditions
                        </a>.
                    </label>
                </div>
                <div>
                    @error('agree')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="mt-6 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none
                        focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
                        dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>

                <div class="mt-5 text-sm font-medium text-gray-500 dark:text-gray-300">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-purple-700 hover:underline dark:text-purple-500">
                        Sign in
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-layouts.app>
