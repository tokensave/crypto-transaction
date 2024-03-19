<div class="security">
    <x-title>
        Безопасность

        <x-slot:description>
            Настройки безопасности вашего аккаунта.
        </x-slot:description>

    </x-title>

    <x-list>
        <x-list.item>

            <x-slot:name>
                Ваш пароль
            </x-slot:name>

            <x-slot:value>
                @if($user->password_at)
                    Изменен {{ $user->password_at->translatedFormat('j F Y') }}
                @else
                    Пароль не изменялся
                @endif
            </x-slot:value>

            <x-slot:action>
                <x-link to="{{ route('user.settings.password.edit') }}">Изменить</x-link>
            </x-slot:action>

        </x-list.item>
    </x-list>
</div>




