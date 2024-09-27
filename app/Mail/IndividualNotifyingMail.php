<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IndividualNotifyingMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Project $project;
    protected string $emailSubject;
    protected string $emailContent;

    public function __construct($project, $subject, $content)
    {
        $this->project = $project;
        $this->emailSubject = $subject;
        $this->emailContent = $content;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.individual_notifying',
            with: [
                'project' => $this->project,
                'subject' => $this->emailSubject,
                'content' => $this->emailContent,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
