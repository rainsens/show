<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Material;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index(Project $project)
    {
        $materials = $project->materials()->orderByDesc('id')->paginate();
        return view('materials.index', compact('materials', 'project'));
    }

    public function create(Project $project)
    {
        return view('materials.create', compact('project'));
    }

    public function store(StoreMaterialRequest $request, Project $project)
    {
        $file = $request->file('material');
        $path = Storage::disk('public')->putFile('upload', $file);
        $project->materials()->create([
            'material' => $path,
            'title' => $request->title,
        ]);
        session()->flash('success', 'The project material created successfully.');
        return redirect(route('projects.materials.index', $project));
    }

    public function show(Material $material)
    {
        //
    }

    public function edit(Material $material)
    {
        return view('materials.edit', compact('material'));
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $data = ['title' => $request->title];
        if ($file = $request->file('material')) {
            $path = Storage::disk('public')->putFile('upload', $file);
            $data['material'] = $path;
        }
        $material->update($data);
        session()->flash('success', 'The project material updated successfully.');
        return redirect(route('projects.materials.index', $material->project_id));
    }

    public function destroy(Material $material)
    {
        Gate::authorize('delete', $material);
        $material->delete();
        session()->flash('success', 'The project material deleted successfully.');
        return redirect()->route('projects.materials.index', $material->project_id);
    }
}
