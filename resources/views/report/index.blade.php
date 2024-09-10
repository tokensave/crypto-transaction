<x-layouts.base>

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
                <x-menu.link to="{{ route('user.settings') }}">
                    Настройки
                </x-menu.link>
                <x-menu.link name="logout">
                    Выйти
                </x-menu.link>
            </x-menu.option>
        </x-menu.block>
    </x-menu>

    <div class="flex flex-col items-center">
        <form action="{{ route('report.info') }}" method="GET" class="flex flex-col items-center">
            <div class="mb-4">
                <label for="date" class="block text-sm text-center font-medium text-white">Выберите дату</label>
                <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                Сформировать отчет
            </button>
        </form>
    </div>

</x-layouts.base>
