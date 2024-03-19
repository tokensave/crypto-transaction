<?php

namespace App\Enums\Password;

enum PasswordStatusEnum: string
{
    case pending = 'pending';
    case completed = 'completed';
    case expired = 'expired';

}
