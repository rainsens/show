<div class="font-bold">Team Name:</div>
<div>{{ $project->team_name }}</div>
<div class="my-2 font-bold">Team Members:</div>
<div>
    <ul class="max-w-md divide-gray-200">
        @foreach($project->members as $member)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <a href="{{ route('users.show', $member->user_id) }}">
                            <img class="w-10 h-10 rounded-full" src="{{ Str::startsWith($member->user->avatar, 'http') ? $member->user->avatar : asset($member->user->avatar) }}" alt="{{ $member->user->name }}">
                        </a>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate hover:text-purple-700">
                            <a href="{{ route('users.show', $member->user_id) }}">{{ $member->user->name }}</a>
                        </p>
                        <p class="flex items-center text-sm text-gray-500 truncate hover:text-purple-700">
                            <a href="{{ route('notices.email', $project) }}">
                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                                </svg>
                            </a>
                            <span class="ms-1">{{ Str::limit($member->user->title, 12) }}</span>
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
