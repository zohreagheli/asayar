<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('درخواست بازیابی رمز عبور')
            ->greeting('سلام!')
            ->line('درخواست بازیابی رمز عبور برای حساب شما ثبت شده است')
            ->action('بازیابی رمز عبور', $resetUrl)
            ->line('این لینک تا ۶۰ دقیقه آینده معتبر است')
            ->line('اگر شما این درخواست را انجام نداده‌اید، نیازی به انجام هیچ اقدامی نیست')
            ->salutation('با احترام، تیم پشتیبانی ' . config('app.name'));
    }
}
