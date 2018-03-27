<?php

namespace App\Notifications\Chat;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPinwallPostNotification extends Notification
{
    use Queueable;

    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    public function toOneSignal($notifiable)
    {
        //now you can build your message with the $this->data information
        return OneSignalMessage::create()
            ->subject("Padermeet🎉 - Neue Nachricht")
            ->body("Klicke hier für details")
            ->url('https://padermeet.de/pinwall')
            ->webButton(
                OneSignalWebButton::create('Pinnwand')
                    ->text('Klicke hier')
                    ->icon('https://padermeet.de/img/logo.png')
                    ->url('https://padermeet.de/pinwall')
            );
    }
    public function routeNotificationForOneSignal()
    {
        /*
         * you have to return the one signal player id tat will 
         * receive the message of if you want you can return 
         * an array of players id
         */
        
         return $this->message->user->user_one_signal_id;
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
