<div class="font-bold mt-5">Collaboration Tools</div>
<div class="mt-1">
    @foreach($project->tools as $tool)
        <a href="{{ $tool->link }}" target="_blank" class="flex items-center mt-2 hover:text-purple-700">
            <svg class="w-3 h-3 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
            </svg>
            <span class="ms-1">{{ $tool->title }}</span>
        </a>
    @endforeach
</div>
