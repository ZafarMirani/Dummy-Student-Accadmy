namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailTitle;
    public $emailBody;

    /**
     * Create a new message instance.
     *
     * @param  string  $emailTitle
     * @param  string  $emailBody
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
        return $this->view('emails.custom')
                    ->subject($this->emailTitle)
                    ->with('content', $this->emailBody);
    }
}