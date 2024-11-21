<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyToMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $replyContent;

    public function __construct($replyContent)
    {
        $this->replyContent = $replyContent;
    }

    public function build()
    {
        return $this->view('emails.reply')
                    ->subject('Reply to your message')
                    ->with(['replyContent' => $this->replyContent]);
    }
}
