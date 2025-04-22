<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendInviteRoleMail extends Mailable
{
    use Queueable, SerializesModels;

    private $username ;
    private $communityName ;
    private $role ;

    /**
     * Create a new message instance.
     */
    public function __construct($username,$communityName,$role,$CommunityID,$userID)
    {
        //
        $this->username = $username;
        $this->communityName = $communityName;
        $this->role = $role;
        $this->CommunityID = $CommunityID;
        $this->userID = $userID;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We Want You as a '.$this->role.' – Confirm Your Invitation Today',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.send-invite-role-mail',
            with: [
                "username"=>$this->username ,
                "communityName"=>$this->communityName ,
                "role"=>$this->role ,
                "CommunityID"=>$this->CommunityID,
                "userID"=>$this->userID,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
