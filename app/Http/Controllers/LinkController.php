<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;

class LinkController extends Controller
{
    public function index(Project $project)
    {
        $links = $project->links()->orderByDesc('id')->paginate();
        return view('links.index', compact('links', 'project'));
    }

    public function create(Project $project)
    {
        return view('links.create', compact('project'));
    }

    public function store(StoreLinkRequest $request, Project $project)
    {
        $project->links()->create([
            'title' => $request->title,
            'link' => $request->link,
        ]);
        session()->flash('success', 'The project link created successfully.');
        return redirect(route('projects.links.index', $project));
    }

    public function edit(link $link)
    {
        return view('links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, link $link)
    {
        $link->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);
        session()->flash('success', 'The project link updated successfully.');
        return redirect(route('projects.links.index', $link->project_id));
    }

    public function destroy(link $link)
    {
        Gate::authorize('delete', $link);
        $link->delete();
        session()->flash('success', 'The project link deleted successfully.');
        return redirect()->route('projects.links.index', $link->project_id);
    }
}
