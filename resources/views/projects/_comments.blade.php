@foreach($project->comments as $comment)
    <div class="mt-5 flex items-start gap-2.5">
        <img class="w-8 h-8 rounded-full" src="{{ Str::startsWith($comment->user->avatar, 'http') ? $comment->user->avatar : asset($comment->user->avatar) }}" alt="">
        <div class="flex flex-col gap-1 w-full">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900">{{ $comment->user->name }}</span>
                <span class="text-sm font-normal text-gray-500">{{ $comment->created_at->format('H:m') }}</span>
            </div>
            <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl">
                <p class="text-sm font-normal text-gray-900">
                    {{ $comment->comment }}
                </p>
            </div>
        </div>
        <button id="dropdownMenuIconButton" data-dropdown-toggle="{{ "comment_".$comment->id }}" data-dropdown-placement="bottom-start" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
            </svg>
        </button>
        <div id="{{ "comment_".$comment->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
                <li>
                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block px-4 py-2 hover:bg-gray-100">Delete</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
@endforeach
<div class="mt-10">
    <form method="POST" action="{{ route('projects.comments.store', $project) }}">
        @csrf
        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" name="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required ></textarea>
            </div>
            <div class="flex items-center justify-end px-3 py-2 border-t">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-purple-700 rounded-lg focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-900 hover:bg-purple-800">
                    Post comment
                </button>
            </div>
        </div>
    </form>
    <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">Remember, contributions to this topic should follow our <a href="#" class="text-purple-600 dark:text-purple-500 hover:underline">Community Guidelines</a>.</p>
</div>
