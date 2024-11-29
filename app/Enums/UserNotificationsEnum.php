<?php

namespace App\Enums;

enum UserNotificationsEnum : string
{
    case mail = 'mail';
    case telegram = 'telegram';
    case sms = 'sms';

    public static function select()
    {
        return [
            self::mail->value => 'Mail',
            self::telegram->value => 'Telegram',
            self::sms->value => 'SMS',
        ];
    }

    public function name(): string
    {
        return match ($this)
        {
            self::mail => 'mail',
            self::telegram => 'telegram',
            self::sms => 'sms'
        };
    }
}
