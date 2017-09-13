<?php

namespace App\Notifications;

use App\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RoleChanged extends Notification
{
    private $role;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        //
        $this->role = $role;
    }

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
    public function toArray($notifiable)
    {
        return [
        'at' => Carbon::now(),
             'user' => auth()->user()     ,
              'role_id' => $this->role->id,
              'role_display_name' => $this->role->display_name,
              
        ];
    }
}
