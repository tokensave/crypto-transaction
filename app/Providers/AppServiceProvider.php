<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Telegram\Provider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        bcscale(8);
    }

    public function boot(): void
    {
        $this->registerSocialite();

        $this->setPasswordDefault();

    }

    private function setPasswordDefault(): void
    {
        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->numbers()
                ->symbols();
        });
    }

    private function registerSocialite(): void
    {
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('telegram', Provider::class);
        });
    }
}
