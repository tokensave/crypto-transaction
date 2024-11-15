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
                    <button type="submit" class="w-full lg:w-auto px-10 py-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                        Сформировать отчет
                    </button>
                </div>

            </div>
        </form>
    </div>

</x-layouts.base>
