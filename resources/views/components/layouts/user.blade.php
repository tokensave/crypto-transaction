<x-layouts.base>
    <div>

        <div class="g:pl-72">
            <x-menu>
                <x-menu.block>
                    <x-menu.button type="button"/>
                    <x-menu.option>
                        <x-menu.link to="{{ route('dashboard.index') }}">
                            Главная панель
                        </x-menu.link>
                        <x-menu.link to="{{ route('dashboard.check') }}">
                            Сделки
                        </x-menu.link>
                        <x-menu.link to="{{ route('report.index') }}">
                            Отчет
                        </x-menu.link>
                        <x-menu.link to="{{ route('dashboard.tools') }}">
                            Инструменты
                        </x-menu.link>
                        <x-menu.link to="{{ route('user.settings') }}">
                            Настройки
                        </x-menu.link>
                        <x-menu.link name="logout">
                            Выйти
                        </x-menu.link>
                    </x-menu.option>
                </x-menu.block>
            </x-menu>

            <x-user.email-confirmation-alert></x-user.email-confirmation-alert>

            <main class="py-10 ">
                <div class="px-4 sm:px-6 lg:px-8 ">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</x-layouts.base>
