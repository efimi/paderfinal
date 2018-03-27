<?php

namespace App\Notifications\Match;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;

class NewUserMatchedToLocationSignal extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
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
        return OneSignalMessage::create()
            ->subject("Padermeet")
            ->body("Neues Match heute...")
            ->url('https://padermeet.de')
            ->webButton(
                OneSignalWebButton::create('☝️ ich komme mit')
                    ->text('Klick hier')
                    ->icon('https://padermeet.de/images/padermeetLogo.png')
                    ->url('https://padermeet.de/choose')
            );
    }
    public function routeNotificationForOneSignal()
    {
        return ['7af5b2cf-2701-4960-a195-bce6e567e979','6828eea8-dbf0-4436-8b89-93398a853ca7'];
        // return $user->one_signal_player_id;
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
