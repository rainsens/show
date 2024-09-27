<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Models\Project;
use App\Models\Tool;
use Illuminate\Support\Facades\Gate;

class ToolController extends Controller
{
    public function index(Project $project)
    {
        $tools = $project->tools()->paginate();
        return view('tools.index', compact('tools', 'project'));
    }

    public function create(Project $project)
    {
        return view('tools.create', compact('project'));
    }

    public function store(StoreToolRequest $request, Project $project)
    {
        $project->tools()->create([
            'title' => $request->title,
            'link' => $request->link,
        ]);
        session()->flash('success', 'The project collaborating tool created successfully.');
        return redirect(route('projects.tools.index', $project));
    }

    public function edit(Tool $tool)
    {
        return view('tools.edit', compact('tool'));
    }

    public function update(UpdateToolRequest $request, Tool $tool)
    {
        $tool->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);
        session()->flash('success', 'The project collaborating tool updated successfully.');
        return redirect(route('projects.tools.index', $tool->project_id));
    }

    public function destroy(Tool $tool)
    {
        Gate::authorize('delete', $tool);
        $tool->delete();
        session()->flash('success', 'The project collaborating tool deleted successfully.');
        return redirect()->route('projects.tools.index', $tool->project_id);
    }
}
