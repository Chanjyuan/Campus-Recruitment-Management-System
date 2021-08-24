<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\JobApplication;
use App\User;
use App\Employer;
use App\Post;

class ApplicationAccepted extends Notification
{
    use Queueable;

    /**
     * The job post
     * 
     * @var Post
     */

    public $post;
    
    /**
     * The application
     * 
     * @var JobApplication
     */

    public $jobapp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post, JobApplication $jobapp)
    {
        $this->post = $post;
        $this->jobapp = $jobapp;
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
                    ->line('Congratulations! You are shorlisted for an interview and the employer will contact you shortly for further details!')
                    ->action('New Notification', url('/all-notifications'))
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
            'jobapp' => $this->jobapp,
            'post' => $this->post,
            'replyby' => Employer::find($this->post->employer_id)
        ];
    }
}
