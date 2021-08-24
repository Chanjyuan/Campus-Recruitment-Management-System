<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Employer;
use App\Post;

class PostDeactivated extends Notification
{
    use Queueable;

    /**
     * The job post
     * 
     * @var Post
     */

    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line('The job has been deactivated and no longer appeared on the jobs listing. Please review the job posting or contact UKM-Karier (ukm-karier@ukm.edu.my) for further assistance.')
                    ->action('New Notification', url('/notifications'))
                    ->line('Click the button above to learn more!');
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
            'post' => $this->post,
        ];
    }
}
