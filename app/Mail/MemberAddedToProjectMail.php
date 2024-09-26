<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MemberAddedToProjectMail extends Mailable
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
            subject: 'You are added to a project team',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.member_added_to_project',
            with: ['project' => $this->project],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
