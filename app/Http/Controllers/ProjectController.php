<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Mail\ProjectUpdatedMail;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->paginate();
        return view('projects.index', compact('projects'));
    }
    public function search()
    {
        request()->validate([
            'keywords' => 'required|string|max:128',
        ]);
        $projects = Project::query()->whereAny(
            ['title', 'brief', 'detail'], 'like', '%' . request('keywords') . '%',
        )->orderByDesc('created_at')->paginate();
        return view('projects.index', compact('projects'));
    }

    public function mine()
    {
        $user = auth()->user();
        $projects = $user->projects()->orderByDesc('created_at')->paginate();
        return view('projects.mine', compact('projects'));
    }

    public function show(Project $project)
    {
        $qrcode = QrCode::size(200)->format('svg')->generate(route('projects.show', $project));
        return view('projects.show', compact('project'), compact('qrcode'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $file = $request->file('cover');
        $cover = Storage::disk('public')->putFile('upload', $file);
        $request->user()->projects()->create([
            'initiator' => $request->initiator,
            'title' => $request->title,
            'brief' => $request->brief,
            'cover' => $cover,
            'detail' => $request->detail,
            'progress' => $request->progress,
            'is_team' => (bool)$request->team,
            'team_name' => $request->team_name,
            'is_private' => (bool)$request->private,
        ]);
        session()->flash('success', 'Project created successfully.');
        return redirect(route('projects.mine'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = [
            'initiator' => $request->initiator,
            'title' => $request->title,
            'brief' => $request->brief,
            'detail' => $request->detail,
            'progress' => $request->progress,
            'is_team' => (bool)$request->team,
            'team_name' => $request->team_name,
            'is_private' => (bool)$request->private,
        ];
        if ($file = $request->file('cover')) {
            $cover = Storage::disk('public')->putFile('upload', $file);
            $data['cover'] = $cover;
        }

        $project->update($data);

        Mail::to(config('mail.test_email'))->send(new ProjectUpdatedMail($project));

        session()->flash('success', 'Project updated successfully.');
        return redirect(route('projects.show', $project));
    }

    public function destroy(Project $project)
    {
        //
    }
}
