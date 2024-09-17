<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\Project;
use App\Models\Slide;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index(Project $project)
    {
        $slides = $project->slides()->orderByDesc('id')->paginate();
        return view('slides.index', compact('slides', 'project'));
    }

    public function create(Project $project)
    {
        return view('slides.create', compact('project'));
    }

    public function store(StoreSlideRequest $request, Project $project)
    {
        $file = $request->file('slide');
        $path = Storage::disk('public')->putFile('upload', $file);
        $project->slides()->create([
            'slide' => $path,
            'title' => $request->title,
        ]);
        session()->flash('success', 'The project slide created successfully.');
        return redirect(route('projects.slides.index', $project));
    }

    public function show(Slide $slide)
    {
        //
    }

    public function edit(Slide $slide)
    {
        return view('slides.edit', compact('slide'));
    }

    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $data = ['title' => $request->title];
        if ($file = $request->file('slide')) {
            $path = Storage::disk('public')->putFile('upload', $file);
            $data['slide'] = $path;
        }
        $slide->update($data);
        session()->flash('success', 'The project slide updated successfully.');
        return redirect(route('projects.slides.index', $slide->project_id));
    }

    public function destroy(Slide $slide)
    {
        Gate::authorize('delete', $slide);
        $slide->delete();
        session()->flash('success', 'The project slide deleted successfully.');
        return redirect()->route('projects.slides.index', $slide->project);
    }
}
