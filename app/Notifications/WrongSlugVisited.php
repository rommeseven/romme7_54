<?php

namespace App\Notifications;

use App\Page;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WrongSlugVisited extends Notification
{
    private $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }


    use Queueable;


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
    public function toDatabase($notifiable)
    {
        return [
        'at' => Carbon::now(),
             'username' => ($user = auth()->user()->username)? $user :__(@lang("Anonymous Visitor")),
             // LACI: Passt das wie ich das gemacht habe? @lang ins de.json Unbekannter User
              'slug' => $this->slug
              
        ];
    }
}
