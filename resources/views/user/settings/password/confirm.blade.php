<x-layouts.settings>
    <x-title>
        Подтверждение изменения пароля

        <x-slot:description>
            Введите код подтверждения, отправленный на {{ $confirmation->provider }}.
        </x-slot:description>
    </x-title>

    <x-form action="{{ route('user.settings.password.verify', $confirmation) }}" method="post">
        <x-list>
            <x-list.item>
                <x-slot:name>
                    Код подтверждения
                </x-slot:name>

                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text name="code" autofocus/>
                        </div>
                    </div>
                </x-slot:value>
            </x-list.item>
        </x-list>

        <x-form.footer>
            <x-slot:buttons>
                <x-button to="{{ route('user.settings') }}" color="white">
                    Отмена
                </x-button>

                <x-button type="submit">
                    Подтвердить
                </x-button>
            </x-slot:buttons>
        </x-form.footer>
    </x-form>
</x-layouts.settings>