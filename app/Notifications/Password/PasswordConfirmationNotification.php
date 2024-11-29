<?php

namespace App\Notifications\Password;

use App\Models\PasswordConfirmation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordConfirmationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private PasswordConfirmation $confirmation,
    )
    {
    }

    public function via(object $notifiable): array
    {
        return [$this->confirmation->provider->value];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Подтверждение смены пароля')
        ->greeting('Здравствуйте!')
        ->line('Вы запросили смену пароля.')
        ->line('Ваш код подтверждения: ' . $this->confirmation->code)
        ->line('Код действителен в течение 30 минут.')
        ->line('Если вы не запрашивали смену пароля, проигнорируйте это сообщение.');

    }
}
