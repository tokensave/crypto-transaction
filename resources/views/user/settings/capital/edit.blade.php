<x-layouts.settings>

    <x-title>
        Изменить капитал

        <x-slot:description>
            Введите данные.
        </x-slot:description>

    </x-title>

    <x-form action="{{ route('user.settings.capital.update') }}" method="post">

        <x-list>
            <x-list.item>

                <x-slot:name>
                    Текущий капитал
                </x-slot:name>

                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            {{ $user->money_capital->value() }}
                        </div>
                    </div>
                </x-slot:value>

            </x-list.item>

        </x-list>

        <x-list>
            <x-list.item>

                <x-slot:name>
                    Новый капитал
                </x-slot:name>

                <x-slot:value>
                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.text type="text" name="money_capital"/>
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
                    Сохранить
                </x-button>
            </x-slot:buttons>

        </x-form.footer>

    </x-form>

</x-layouts.settings>
