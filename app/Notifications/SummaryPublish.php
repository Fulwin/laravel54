<?php

namespace App\Notifications;

use App\Models\Summary;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SummaryPublish extends Notification
{
    use Queueable;

    public $summary;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Summary $summary)
    {
        // 注入回复实体
        $this->summary = $summary;
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

    public function toDatabase($notifiable)
    {
        $link = url('/summaries/' . $this->summary->id);

        // 存入数据库里的数据
        return [
            'summary_id' => $this->summary->id,
            'summary_title' => $this->summary->title,
            'summary_link' => $link,
            'user_avatar' => $this->summary->user->gravatar(50),
            'user_name' => $this->summary->user->name,
            'user_id' => $this->summary->user->id
        ];
    }
}
