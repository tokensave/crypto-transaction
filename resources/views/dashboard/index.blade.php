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

    <div class="flex flex-col items-center my-8 px-4">
        <form action="{{ route('dashboard.capital') }}" method="POST" class="flex flex-col lg:flex-row items-center justify-center gap-y-4 lg:gap-x-4 bg-gray-900 p-4 rounded-lg w-full lg:w-auto">
            @csrf
            <input type="text" name="money_capital" placeholder="Ваш обьем капитала" class="w-full lg:w-auto rounded-lg px-3 py-2 bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:ring focus:ring-indigo-300">
            <button type="submit" class="w-full lg:w-auto px-4 py-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">Добавить количество денежных средств</button>
        </form>
    </div>

    <div class="flex flex-col lg:flex-row justify-center my-8 gap-y-4 lg:gap-x-10 px-4">
        <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto pt-5">
            <p>Калькулятор спреда</p>
        </div>
        <form action="{{ route('dashboard.calculate') }}" method="POST" class="flex flex-col lg:flex-row items-center justify-center gap-y-4 lg:gap-x-4 bg-gray-900 p-4 rounded-lg w-full lg:w-auto">
            @csrf
            <x-table.text type="text" name="first_num" placeholder="Первое число"/>
            <x-table.text type="text" name="second_num" placeholder="Второе число"/>
            <button type="submit" class="w-full lg:w-auto px-10 py-2 ml-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">Посчитать</button>
        </form>
    </div>

    <div class="flex justify-center my-8 px-4">
        @isset($result)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат : {{ number_format($result, 2)? : null }} %</p>
            </div>
        @endisset
    </div>

    <div class="flex flex-col items-center justify-center bg-gray-900 px-4">
        <form action="{{ route('dashboard.store') }}" method="POST" class="w-full lg:w-auto">
            @csrf
            <x-table>
                <thead>
                <tr class="bg-gray-800">
                    <x-table.thead>Актив</x-table.thead>
                    <x-table.thead>Биржа</x-table.thead>
                    <x-table.thead>Действие с активом</x-table.thead>
                    <x-table.thead>Курс</x-table.thead>
                    <x-table.thead>Сумма</x-table.thead>
                    <x-table.thead>Банк</x-table.thead>
                    <x-table.thead>Комиссия биржи</x-table.thead>
                    <x-table.thead>Идентификатор сделки</x-table.thead>
                    <x-table.thead>Добавить</x-table.thead>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-gray-700">
                    <x-table.tbody>
                        <x-table.select name="active" :options="App\Enums\CryptoActiveEnum::select()" class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.select name="crypto_exchange" :options="App\Enums\CryptoExchangeEnum::select()" class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.select name="action" :options="App\Enums\ActionsActiveEnum::select()" class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="course" placeholder="Введите курс"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="sum" placeholder="Введите сумму"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.select name="provider" :options="App\Enums\BanksEnum::select()" class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="cost" placeholder="Введите комиссию"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="deal_id" placeholder="Введите id сделки"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <button type="submit" class="text-gray-400 hover:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" id="Check-Double--Streamline-Cyber">
                                <desc>Check Double Streamline Icon: https://streamlinehq.com</desc>
                                <path stroke="#1023c7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M2.0868 12.5113L0.7513 14.5565L7.3983 22.2261L18.1356 1.7739L5.8644 15.5791L2.0868 12.5113Z" stroke-width="1"></path>
                                <path stroke="#1023c7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M11.4887 19.1583L14.0452 21.2035L23.2487 2.7965L15.0944 11.728" stroke-width="1"></path>
                            </svg>
                        </button>
                    </x-table.tbody>
                </tr>
                </tbody>
            </x-table>
        </form>
    </div>
</x-layouts.base>
