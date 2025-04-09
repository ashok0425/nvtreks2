<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class EnquiryReceived extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('info@nepalvisiontreks.com', 'Nepal Vision')
            ->subject($this->data['subject'])
            // ->bcc('yubraj.misfit@gmail.com')
            ->line('Hello')
            ->line('New Enquiry Request Received')
            ->line("Name: ".$this->data['name']);
    }
}
