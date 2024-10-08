<?php

namespace App\Http\Controllers;

use App\Mail\IndividualNotifyingMail;
use App\Models\Project;
use App\Mail\TeamNotifyingMail;
use Illuminate\Support\Facades\Mail;

class NoticeController extends Controller
{
    public function create(Project $project)
    {
        return view('notices.create', compact('project'));
    }

    public function store(Project $project)
    {
        request()->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Mail::to(config('mail.test_email'))->send(new TeamNotifyingMail(
            $project,
            request('subject'),
            request('content')
        ));

        session()->flash('success', 'A project notification sent successfully.');
        return redirect(route('projects.show', $project));
    }
    public function email(Project $project)
    {
        return view('notices.email', compact('project'));
    }

    public function send(Project $project)
    {
        request()->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Mail::to(config('mail.test_email'))->send(new IndividualNotifyingMail(
            $project,
            request('subject'),
            request('content')
        ));

        session()->flash('success', 'The individual notification sent successfully.');
        return redirect(route('projects.show', $project));
    }
}
