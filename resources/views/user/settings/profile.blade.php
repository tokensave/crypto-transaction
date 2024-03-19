<div class="profile">
    <x-title>
        Профиль
        <x-slot:description>
            Просмотр и изменение личных данных.
        </x-slot:description>
    </x-title>

    <x-list>
        <x-list.item>

            <x-slot:name>
                Ваше имя
            </x-slot:name>

            <x-slot:value>
                {{ $user->getFullName() }}
            </x-slot:value>

            <x-slot:action>
                <x-link to="{{ route('user.settings.profile.edit') }}">Изменить</x-link>
            </x-slot:action>

        </x-list.item>

    </x-list>

</div>



