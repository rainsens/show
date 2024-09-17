<x-layouts.app>
    <div class="flex flex-col justify-center items-center py-8 px-6 mx-auto">
        <div class="bg-white p-6 shadow-md md:rounded-lg border border-gray-100 justify-center items-center w-full rounded-lg lg:flex md:mt-0 lg:max-w-screen-lg xl:p-0">
            <div class="p-6 w-full sm:p-8 lg:p-10">
                <a href="{{ route('projects.materials.index', $material->project_id) }}" type="button" class="mb-8 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-gray-900 bg-white rounded-full hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 text-purple-700 me-2">
                        <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                    </svg>
                    Go Back
                </a>
                <h5 class="mb-10 text-xl font-bold leading-none text-gray-900 dark:text-white">
                    Edit the material for Project: <span class="text-purple-700">{{ $material->project->title }}</span>
                </h5>
                <form method="POST" action="{{ route('materials.update', $material) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="material">
                            Material
                        </label>
                        <div class="my-5">
                            <a href="{{ asset($material->material) }}" class="flex items-center text-sm font-medium text-gray-900 hover:text-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
                                    <path d="M11.625 16.5a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z" />
                                    <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 0 0 1.06-1.06l-1.047-1.048A3.375 3.375 0 1 0 11.625 18Z" clip-rule="evenodd" />
                                    <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                </svg>
                                <span class="mr-2">{{ $material->title }}</span>
                                <span class="text-gray-500">{{ $material->material }}</span>
                            </a>
                        </div>
                        <input id="material" name="material" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" />
                        @error('material')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                            Title
                        </label>
                        <input type="text" id="title" name="title" value="{{ $material->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="Title" />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
