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
                        <x-table.select name="active" :options="App\Enums\CryptoActiveEnum::select()"
                                        class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.select name="crypto_exchange" :options="App\Enums\CryptoExchangeEnum::select()"
                                        class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.select name="action" :options="App\Enums\ActionsActiveEnum::select()"
                                        class="bg-transparent" placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="course" placeholder="Введите курс"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="sum" placeholder="Введите сумму"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.select name="provider" :options="App\Enums\BanksEnum::select()" class="bg-transparent"
                                        placeholder="Выбрать"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="cost" placeholder="Введите комиссию"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <x-table.text type="text" name="deal_id" placeholder="Введите id сделки"/>
                    </x-table.tbody>
                    <x-table.tbody>
                        <button type="submit" class="text-gray-400 hover:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 id="Business-Deal-Handshake-1--Streamline-Ultimate" height="24" width="24">
                                <desc>Business Deal Handshake 1 Streamline Icon: https://streamlinehq.com</desc>
                                <defs></defs>
                                <path
                                    d="M2.2 12C2.2 19.544 10.3667 24.2591 16.9 20.487C19.9321 18.7364 21.8 15.5012 21.8 12C21.8 4.456 13.6333 -0.2591 7.1 3.513C4.0679 5.2636 2.2 8.4988 2.2 12"
                                    fill="#dff9ff" stroke-width="1"></path>
                                <path
                                    d="M20.33 8.3044V15.1644L14.4402 16.2816C14.4483 16.2364 14.4516 16.1904 14.45 16.1444H14.94C15.4972 16.1464 16.0068 15.8308 16.2532 15.331C16.5005 14.8332 16.4475 14.2387 16.116 13.7924L12.9702 9.7646L10.9514 10.431C10.0969 10.7014 9.2702 9.9453 9.4633 9.0701C9.5381 8.7311 9.7604 8.4431 10.0694 8.2848L10.579 8.03L13.4602 6.5992C14.0422 6.3054 14.7201 6.2664 15.332 6.4914Z"
                                    fill="#dff9ff" stroke-width="1"></path>
                                <path
                                    d="M16.2552 15.332C16.0088 15.8318 15.4991 16.1474 14.942 16.1454H14.452C14.4536 16.1914 14.4503 16.2373 14.4422 16.2826C14.3484 17.3906 13.212 18.0941 12.1784 17.684L12.002 17.6154V18.2328C11.9945 19.2686 10.8687 19.9079 9.9754 19.3836C9.8492 19.3096 9.736 19.2155 9.6402 19.105L6.12 15.1644H3.67V9.2844L8.1878 7.4714C8.8646 7.2053 9.6305 7.3052 10.2164 7.736L10.579 8.03L10.0694 8.2848C9.2717 8.6934 9.2156 9.8123 9.9683 10.2988C10.2599 10.4873 10.6204 10.5358 10.9514 10.431L12.9702 9.7646L16.116 13.7924C16.4485 14.2385 16.5023 14.8335 16.2552 15.332Z"
                                    fill="#dff9ff" stroke-width="1"></path>
                                <path
                                    d="M15.6917 13.2456L16.118 13.7924C16.4494 14.2387 16.5024 14.8332 16.2552 15.331C16.0088 15.8308 15.4991 16.1464 14.942 16.1444H14.452C14.4536 16.1904 14.4503 16.2364 14.4422 16.2816L20.332 15.1644V12.2862C18.8166 12.7424 17.2637 13.0635 15.6917 13.2456Z"
                                    fill="#dff9ff" stroke-width="1"></path>
                                <path
                                    d="M15.6917 13.2456C14.5314 13.381 13.3642 13.4488 12.196 13.4484C9.3048 13.4641 6.4287 13.0317 3.67 12.1666V15.1644H6.12L9.6382 19.104C10.317 19.8864 11.5882 19.6405 11.9263 18.6614C11.9742 18.5228 11.9991 18.3774 12 18.2308V17.6144L12.1764 17.683C13.21 18.0931 14.3464 17.3897 14.4402 16.2816C14.4483 16.2364 14.4516 16.1904 14.45 16.1444H14.94C15.4972 16.1464 16.0068 15.8308 16.2532 15.331C16.5005 14.8332 16.4475 14.2387 16.116 13.7924Z"
                                    fill="#dff9ff" stroke-width="1"></path>
                                <path d="M14.452 9.2844L12.9722 9.7646" stroke="#00303e" stroke-linecap="round"
                                      stroke-linejoin="round" fill="none" stroke-width="1"></path>
                                <path
                                    d="M20.33 8.3044V15.1644L14.4402 16.2816C14.4483 16.2364 14.4516 16.1904 14.45 16.1444H14.94C15.4972 16.1464 16.0068 15.8308 16.2532 15.331C16.5005 14.8332 16.4475 14.2387 16.116 13.7924L12.9702 9.7646L10.9514 10.431C10.0969 10.7014 9.2702 9.9453 9.4633 9.0701C9.5381 8.7311 9.7604 8.4431 10.0694 8.2848L10.579 8.03L13.4602 6.5992C14.0422 6.3054 14.7201 6.2664 15.332 6.4914Z"
                                    stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" fill="none"
                                    stroke-width="1"></path>
                                <path
                                    d="M16.2552 15.332C16.0088 15.8318 15.4991 16.1474 14.942 16.1454H14.452C14.4536 16.1914 14.4503 16.2373 14.4422 16.2826C14.3484 17.3906 13.212 18.0941 12.1784 17.684L12.002 17.6154V18.2328C11.9945 19.2686 10.8687 19.9079 9.9754 19.3836C9.8492 19.3096 9.736 19.2155 9.6402 19.105L6.12 15.1644H3.67V9.2844L8.1878 7.4714C8.8646 7.2053 9.6305 7.3052 10.2164 7.736L10.579 8.03L10.0694 8.2848C9.2717 8.6934 9.2156 9.8123 9.9683 10.2988C10.2599 10.4873 10.6204 10.5358 10.9514 10.431L12.9702 9.7646L16.116 13.7924C16.4485 14.2385 16.5023 14.8335 16.2552 15.332Z"
                                    stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" fill="none"
                                    stroke-width="1"></path>
                                <path
                                    d="M0.73 7.3244H2.69C3.2313 7.3244 3.67 7.7632 3.67 8.3044V15.1644C3.67 15.7057 3.2312 16.1444 2.69 16.1444H0.73"
                                    fill="#9feaff" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1"></path>
                                <path
                                    d="M23.27 16.1444H21.31C20.7688 16.1444 20.33 15.7057 20.33 15.1644V8.3044C20.33 7.7632 20.7688 7.3244 21.31 7.3244H23.27"
                                    fill="#9feaff" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1"></path>
                                <path d="M12 17.6144L11.02 16.6344" stroke="#00303e" stroke-linecap="round"
                                      stroke-linejoin="round" fill="none" stroke-width="1"></path>
                                <path d="M12.98 14.6744L14.45 16.1444" stroke="#00303e" stroke-linecap="round"
                                      stroke-linejoin="round" fill="none" stroke-width="1"></path>
                            </svg>
                        </button>
                    </x-table.tbody>
                </tr>
                </tbody>
            </x-table>
        </form>
    </div>

    <div class="flex flex-col lg:flex-row justify-center my-8 gap-y-4 lg:gap-x-10 px-4">
        <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto pt-5">
            <p>Калькулятор спреда</p>
        </div>
        <form action="{{ route('dashboard.calculate') }}" method="POST"
              class="flex flex-col lg:flex-row items-center justify-center gap-y-4 lg:gap-x-4 bg-gray-900 p-4 rounded-lg w-full lg:w-auto">
            @csrf
            <x-table.text type="text" name="first_num" placeholder="Первое число"/>
            <x-table.text type="text" name="second_num" placeholder="Второе число"/>
            <button type="submit"
                    class="w-full lg:w-auto px-10 py-2 ml-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Посчитать
            </button>
        </form>
    </div>

    <div class="flex justify-center my-8 px-4">
        @isset($result)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат : {{ number_format($result, 2)? : null }} %</p>
            </div>
        @endisset
    </div>

    <div class="flex flex-col lg:flex-row justify-center my-8 gap-y-4 lg:gap-x-10 px-4">
        <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto pt-5">
            <p>Калькулятор спреда кросс конвертации</p>
        </div>
        <form action="{{ route('dashboard.calculate.cross') }}" method="POST"
              class="flex flex-col lg:flex-row items-center justify-center gap-y-4 lg:gap-x-4 bg-gray-900 p-4 rounded-lg w-full lg:w-auto">
            @csrf
            <x-table.text type="text" name="course_buy" placeholder="Курс закупа"/>
            <x-table.text type="text" name="sum_buy" placeholder="Сумма закупа"/>
            <select name="active_buy"
                    class="block w-full rounded-md border-0 py-2 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 bg-gray-900 text-white">
                <option value="" disabled selected>Актив закупа</option>
                @foreach(App\Enums\CryptoActiveEnum::select() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <select name="active_sell"
                    class="block w-full rounded-md border-0 py-2 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 bg-gray-900 text-white">
                <option value="" disabled selected>Актив продажи</option>
                @foreach(App\Enums\CryptoActiveEnum::select() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <x-table.text type="text" name="course_sell" placeholder="Курс продажи"/>
            <button type="submit"
                    class="w-full lg:w-auto px-10 py-2 ml-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Посчитать
            </button>
        </form>
    </div>

    <div class="flex justify-center my-8 px-4">
        @isset($profit_rub)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат в рублях: {{ number_format($profit_rub, 2)? : null }} RUB</p>
            </div>
        @endisset
        @isset($profit)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат в процентах: {{ number_format($profit, 2)? : null }} %</p>
            </div>
        @endisset
    </div>

</x-layouts.base>
