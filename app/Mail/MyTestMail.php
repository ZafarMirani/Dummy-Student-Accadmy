<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $emailTitle;
    public $emailBody;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailTitle, $emailBody)
    {
        $this->emailTitle = $emailTitle;
        $this->emailBody = $emailBody;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.myTestmail')
                    ->subject($this->emailTitle)
                    ->with('content', $this->emailBody);
    }
}