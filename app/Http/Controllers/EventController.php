<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index(Project $project)
    {
        $events = $project->events()->orderByDesc('id')->paginate();
        return view('events.index', compact('events', 'project'));
    }

    public function create(Project $project)
    {
        return view('events.create', compact('project'));
    }

    public function store(StoreEventRequest $request, Project $project)
    {
        $project->events()->create([
            'when' => Carbon::parse($request->when),
            'event' => $request->event,
            'summary' => $request->summary,
        ]);
        session()->flash('success', 'The project timeline event created successfully.');
        return redirect(route('projects.events.index', $project));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update([
            'when' => $request->when,
            'event' => $request->event,
            'summary' => $request->summary,
        ]);
        session()->flash('success', 'The project timeline event updated successfully.');
        return redirect(route('projects.events.index', $event->project_id));
    }

    public function destroy(Event $event)
    {
        Gate::authorize('delete', $event);
        $event->delete();
        session()->flash('success', 'The project timeline event deleted successfully.');
        return redirect()->route('projects.events.index', $event->project_id);
    }
}
