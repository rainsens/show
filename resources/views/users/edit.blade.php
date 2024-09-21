<x-layouts.app>
    <div class="max-w-screen-lg flex flex-col justify-center items-center py-8 px-6 mx-auto">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="w-full p-10 bg-white rounded-lg">
            @csrf
            @method('PUT')
            <div class="mb-6 mt-10">
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                @endif
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    User name
                </label>
                <input type="text" id="name" name="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                       rounded-lg focus:ring-purple-500 focus:border-purple-500 block
                       w-full p-2.5" placeholder="User name" value="{{ $user->name }}" />
                @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 mt-10">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                    Email address
                </label>
                <input type="email" id="email" name="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                       rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="User email" value="{{ $user->email }}" />
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="avatar">
                    Avatar
                </label>
                <img src="{{ Str::startsWith($user->avatar, 'http') ? $user->avatar : asset($user->avatar) }}" class="w-28 h-28 rounded-full mb-2">
                <input id="avatar" name="avatar" type="file"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                       cursor-pointer bg-gray-50 focus:outline-none" />
                @error('avatar')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    Title
                </label>
                <input type="text" id="title" name="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Title" value="{{ $user->title }}" />
                @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">
                    Address
                </label>
                <input type="text" id="address" name="address"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Address" value="{{ $user->address }}" />
                @error('address')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="intro" class="block mb-2 text-sm font-medium text-gray-900">
                    Introduction
                </label>
                <textarea id="intro" rows="10" name="intro"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                          border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Write your introduction here...">{{ $user->interest }}</textarea>
                @error('intro')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="github" class="block mb-2 text-sm font-medium text-gray-900">
                    Github
                </label>
                <input type="text" id="github" name="github"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Github" value="{{ $user->github }}" />
                @error('github')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-900">
                    Linkedin
                </label>
                <input type="text" id="linkedin" name="linkedin"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Linkedin" value="{{ $user->linkedin }}" />
                @error('linkedin')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900">
                    Facebook
                </label>
                <input type="text" id="facebook" name="facebook"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Facebook" value="{{ $user->facebook }}" />
                @error('facebook')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="twitter" class="block mb-2 text-sm font-medium text-gray-900">
                    Twitter
                </label>
                <input type="text" id="twitter" name="twitter"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                       placeholder="Twitter" value="{{ $user->twitter }}" />
                @error('twitter')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="interest" class="block mb-2 text-sm font-medium text-gray-900">
                    Interest
                </label>
                <textarea id="interest" rows="4" name="interest"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                          border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Write your interests here...">{{ $user->interest }}</textarea>
                @error('interest')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="interest" class="block mb-2 text-sm font-medium text-gray-900">
                    Credit(one line per credit)
                </label>
                <textarea id="interest" rows="6" name="credit"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                          border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Write your interests here...">{{ $user->credit }}</textarea>
                @error('credit')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 hidden">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" disabled>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900">Is Admin User</span>
                </label>
            </div>
            <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</x-layouts.app>
