<?php

namespace App\Console\Commands;

use App\Enums\Password\PasswordStatusEnum;
use App\Models\Password;
use Illuminate\Console\Command;

class ExpirePasswordsCommand extends Command
{

    protected $signature = 'passwords:expire';

    public function handle()
    {
        $this->warn('Проверка просроченных паролей...');

        $this->expirePasswords();

        $this->warn('Пароли проверены.');
    }

    private function expirePasswords() :void
    {
        Password::query()
            ->where('status', PasswordStatusEnum::pending)
            ->where('created_at', '<=', now()->subHours(1))
            ->update(['status' => PasswordStatusEnum::expired]);
    }
}
