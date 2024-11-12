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

    <div class="flex flex-col items-center">
        <form action="{{ route('report.info') }}" method="GET" class="flex flex-col items-center">
            <div class="mb-4 flex space-x-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-white">Начальная дата</label>
                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-white">Конечная дата</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                Сформировать отчет
            </button>
        </form>

    </div>

</x-layouts.base>
