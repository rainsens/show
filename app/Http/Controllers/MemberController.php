<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Mail\MemberAddedToProjectMail;
use App\Models\Member;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    public function index(Project $project)
    {
        $members = $project->members()->orderByDesc('id')->paginate();
        return view('members.index', compact('members', 'project'));
    }

    public function create(Project $project)
    {
        return view('members.create', compact('project'));
    }

    public function store(StoreMemberRequest $request, Project $project)
    {
        $user = User::query()->firstWhere('email', $request->email);
        if ($user->id === $request->user()->id) {
            throw ValidationException::withMessages(['email' => 'Cannot add yourself as a member again.']);
        }

        $project->members()->create([
            'user_id' => $user->id,
        ]);

        Mail::to(config('mail.test_email'))->send(new MemberAddedToProjectMail($project));

        session()->flash('success', 'The project team member created successfully.');
        return redirect(route('projects.members.index', $project));
    }

    public function destroy(Member $member)
    {
        Gate::authorize('delete', $member);
        $member->delete();
        session()->flash('success', 'The project member deleted successfully.');
        return redirect()->route('projects.members.index', $member->project_id);
    }
}
