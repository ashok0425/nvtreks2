<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingNotification extends Notification
{

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('noreply@nepalvisiontreks.com')
            ->subject('New Package Booking Received')
            ->line('A new package booking has been made. Details are as follows:')
            ->line('Name: ' . $this->booking->name)
            ->line('Email: ' . $this->booking->email)
            ->line('Phone: ' . $this->booking->phone)
            ->line('Departure Date: ' . $this->booking->departure_date)
            ->line('Group Size: ' . $this->booking->group_size)
            ->line('Message: ' . $this->booking->message)
            ->line('Source: ' . $this->booking->source)
            ->line('User IP: ' . $this->booking->user_ip)
            ->line('Booking ID: ' . $this->booking->uuid);
    }
}
