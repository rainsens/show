<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProjectCommentedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Project $project;

    public function __construct($data)
    {
        $this->project = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'A new comment was posted to your project',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.project_commented',
            with: ['project' => $this->project],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
