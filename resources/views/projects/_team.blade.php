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
                        <p class="text-sm text-gray-500 truncate hover:text-purple-700">
                            {{ $member->user->title }}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
