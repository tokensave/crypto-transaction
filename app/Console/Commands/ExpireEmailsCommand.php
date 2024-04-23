<?php

namespace App\Console\Commands;

use App\Enums\Email\EmailStatusEnum;
use App\Models\Email;
use Illuminate\Console\Command;

class ExpireEmailsCommand extends Command
{

    protected $signature = 'emails:expire';

    public function handle()
    {
        $this->warn('Проверка просроченных заявок на потверждение почты...');

        $this->expireEmails();

        $this->warn('Проверка завершена.');
    }

    private function expireEmails() :void
    {
        Email::query()
            ->where('status', EmailStatusEnum::pending)
            ->where('created_at', '<=', now()->subDays(3))
            ->update(['status' => EmailStatusEnum::expired]);
    }
}
