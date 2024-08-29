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

    @if(Auth::user()->report)
    <div class="relative overflow-x-auto pt-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Дата
                </th>
                <th scope="col" class="px-6 py-3">
                    Начальный капитал (RUB)
                </th>
                <th scope="col" class="px-6 py-3">
                    Общая прибыль
                </th>
                <th scope="col" class="px-6 py-3">
                    Остаток активов (USDT)
                </th>
                <th scope="col" class="px-6 py-3">
                    Остаток активов RUB(GARANTEX)
                </th>
                <th scope="col" class="px-6 py-3">
                    Остаток активов (BTC)
                </th>
                <th scope="col" class="px-6 py-3">
                    Остаток активов (ETH)
                </th>
                <th scope="col" class="px-6 py-3">
                    Остаток от начального капитала
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ Auth::user()->report->created_at ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->money_capital->value() ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->report->profit->value() ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->report->usdt_count ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->report->garantex_count ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->report->profit->btc_count ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->report->profit->eth_count ?? 0 }}
                </td>
                <td class="px-6 py-4">
                    {{ Auth::user()->report->remainder_capital->value() ?? 0 }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    @endif

</x-layouts.base>
