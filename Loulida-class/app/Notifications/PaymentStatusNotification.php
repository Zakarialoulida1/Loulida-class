<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentStatusNotification extends Notification
{
    use Queueable;

    

  
        public $status;
    
        public function __construct($status)
        {
            $this->status = $status;
        }
    
        public function via($notifiable)
        {
            return ['mail']; // Send the notification via email
        }
    
        public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('Payment Status Update')
                ->markdown('email.payment_notification', ['status' => $this->status]);
        }
    }
    