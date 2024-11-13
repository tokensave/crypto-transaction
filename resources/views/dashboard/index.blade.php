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
        <form action="{{ route('dashboard.store') }}" method="POST" class="w-full max-w-full lg:w-auto">
            @csrf
            <div class="grid gap-4 grid-cols-1 lg:grid-cols-8 auto-cols-min text-white bg-gray-900 p-4 rounded-lg shadow-lg mx-auto">

                <!-- Актив -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Актив</label>
                    <x-table.select name="active" :options="App\Enums\CryptoActiveEnum::select()" class="bg-transparent w-full" placeholder="Выбрать"/>
                </div>

                <!-- Биржа -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Биржа</label>
                    <x-table.select name="crypto_exchange" :options="App\Enums\CryptoExchangeEnum::select()" class="bg-transparent w-full" placeholder="Выбрать"/>
                </div>

                <!-- Действие с активом -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Действие</label>
                    <x-table.select name="action" :options="App\Enums\ActionsActiveEnum::select()" class="bg-transparent w-full" placeholder="Выбрать"/>
                </div>

                <!-- Курс -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Курс</label>
                    <x-table.text type="text" name="course" placeholder="Введите курс" class="w-full"/>
                </div>

                <!-- Сумма -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Сумма</label>
                    <x-table.text type="text" name="sum" placeholder="Введите сумму" class="w-full"/>
                </div>

                <!-- Банк -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Банк</label>
                    <x-table.select name="provider" :options="App\Enums\BanksEnum::select()" class="bg-transparent w-full" placeholder="Выбрать"/>
                </div>

                <!-- Комиссия биржи -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">Комиссия биржи</label>
                    <x-table.text type="text" name="cost" placeholder="Введите комиссию" class="w-full"/>
                </div>

                <!-- Идентификатор сделки -->
                <div class="flex flex-col">
                    <label class="text-center font-semibold">ID сделки</label>
                    <x-table.text type="text" name="deal_id" placeholder="Введите номер" class="w-full"/>
                </div>

                <!-- Кнопка добавления -->
                <div class="col-span-full mt-4 text-center">
                    <button type="submit" class="w-full lg:w-auto px-10 py-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                        Добавить
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-layouts.base>
