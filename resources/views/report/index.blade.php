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

    <div class="flex justify-center my-8 px-4">
        <form action="{{ route('report.info') }}" method="GET" class="w-full max-w-2xl">
            <div class="grid gap-4 grid-cols-1 md:grid-cols-2 text-black bg-gray-900 p-6 rounded-lg shadow-lg mx-auto">

                <!-- Начальная дата -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-white">Начальная дата</label>
                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Конечная дата -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-white">Конечная дата</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Кнопка Сформировать отчет -->
                <div class="col-span-full mt-4 text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Сформировать отчет
                    </button>
                </div>

            </div>
        </form>
    </div>


</x-layouts.base>
