<?php

namespace App\Http\Controllers;

use App\Mail\ProjectSharingMail;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;

class ShareController extends Controller
{
    public function create(Project $project)
    {
        return view('shares.create', compact('project'));
    }

    public function send(Project $project)
    {
        request()->validate(['email' => 'required|email']);

        Mail::to(request('email'))->send(new ProjectSharingMail($project));

        session()->flash('success', 'Project shared successfully.');
        return redirect(route('projects.show', $project));
    }
}
