<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MassageboxNotification extends Notification
{
    use Queueable;
    private $Massign;
    private $repair_id;   
    public function __construct($Massign,$repair_id)
    {
        $this->Massign = $Massign;
        $this->repair_id = $repair_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'position_id'=>"",
            'floor_id'=>'',
            'repair_id'=>$this->repair_id,
            'Massign'=>$this->Massign,
           
        ];
    }
}
