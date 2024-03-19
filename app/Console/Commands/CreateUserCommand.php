<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'users:create';

    public function handle()
    {
        $user = new User();
        $user->first_name = $this->ask('What is your name?', 'Test');
        $user->email = $this->ask('What is your email?', 'test@foo.bar');
        $user->password = $this->ask('What is your password?', 'Secret1234!');
        $user->save();

        $this->info('User create');
    }
}
