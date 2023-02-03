<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatisticMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $articleCount;
    protected $commentCount;
    public function __construct($viewCount)
    {
        $this->viewCount = $viewCount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@storage-of-things.ru')
            ->to('andrejshaev@gmail.com')
            ->with([
                'viewCount' => $this->viewCount
            ])
            ->view('mail.stats');
    }
}
