<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Mail\ProjectCommentedMail;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Project $project)
    {
        $request->user()->comments()->create([
            'project_id' => $project->id,
            'comment' => $request->comment,
        ]);

        Mail::to(config('mail.test_email'))->send(new ProjectCommentedMail($project));

        session()->flash('success', 'Comment created successfully.');
        return redirect(route('projects.show', $project));
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);
        $comment->delete();
        session()->flash('success', 'Comment deleted successfully.');
        return redirect(route('projects.show', $comment->project_id));
    }
}
