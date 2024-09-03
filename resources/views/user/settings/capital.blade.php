<div class="profile">
    <x-title>
        Капитал
        <x-slot:description>
            Просмотр и изменение рабочего капитала.
        </x-slot:description>
    </x-title>

    <x-list>
        <x-list.item>

            <x-slot:name>
                Ваш капитал
            </x-slot:name>

            <x-slot:value>
                {{ $user->money_capital->value() }}
            </x-slot:value>

            <x-slot:action>
                <x-link to="{{ route('user.settings.capital.edit') }}">Изменить</x-link>
            </x-slot:action>

        </x-list.item>

    </x-list>

</div>



