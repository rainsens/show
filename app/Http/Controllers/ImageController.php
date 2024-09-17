<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(Project $project)
    {
        $images = $project->images()->orderByDesc('id')->paginate();
        return view('images.index', compact('images', 'project'));
    }

    public function create(Project $project)
    {
        return view('images.create', compact('project'));
    }

    public function store(StoreImageRequest $request, Project $project)
    {
        $file = $request->file('image');
        $path = Storage::disk('public')->putFile('upload', $file);
        $project->images()->create([
            'image' => $path,
            'title' => $request->title,
        ]);
        session()->flash('success', 'The project image created successfully.');
        return redirect(route('projects.images.index', $project));
    }

    public function show(Image $image)
    {
        //
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        $data = ['title' => $request->title];
        if ($file = $request->file('image')) {
            $path = Storage::disk('public')->putFile('upload', $file);
            $data['image'] = $path;
        }
        $image->update($data);
        session()->flash('success', 'The project image updated successfully.');
        return redirect(route('projects.images.index', $image->project_id));
    }

    public function destroy(Image $image)
    {
        Gate::authorize('delete', $image);
        $image->delete();
        session()->flash('success', 'The project image deleted successfully.');
        return redirect()->route('projects.images.index', $image->project_id);
    }
}
