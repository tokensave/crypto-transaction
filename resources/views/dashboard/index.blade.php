<x-layouts.base>
    <div class="bg-gray-900 lg:pl-72">
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 px-4 lg:px-8 bg-gray-900 text-white justify-end lg:justify-end">
            <div x-data="{ open: false}" class="relative">
                <button x-on:click="open = true" type="button" class="flex items-center p-1.5" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-currency-bitcoin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 6h8a3 3 0 0 1 0 6a3 3 0 0 1 0 6h-8" /><path d="M8 6l0 12" /><path d="M8 12l6 0" /><path d="M9 3l0 3" /><path d="M13 3l0 3" /><path d="M9 18l0 3" /><path d="M13 18l0 3" /></svg>
                    <span class="hidden lg:flex lg:items-center">
                        <span class="ml-4 text-sm font-semibold leading-6" aria-hidden="true">
                           {{ Auth::user()->first_name }}
                        </span>
                        <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                </button>
                <div x-cloak x-show="open" x-on:click.outside="open = false" class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="{{ route('dashboard.index') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">
                        Главная панель
                    </a>
                    <a href="{{ route('dashboard.check') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">
                        Сделки
                    </a>
                    <a href="{{ route('user.settings') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">
                        Настройки
                    </a>
                    <a href="" x-on:click.prevent="$refs.logout.submit()" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-1">
                        Выйти
                        <x-form x-ref="logout" action="{{ route('logout') }}" method="post" class="hidden"></x-form>
                    </a>
                </div>
            </div>
        </div>
    </div>

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
