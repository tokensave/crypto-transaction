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


<div class="relative overflow-x-auto pt-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
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
                {{ Auth::user()->money_capital->value() ?? 0 }}
            </td>
            <td class="px-6 py-4">
                {{ $report->profit->value() ?? 0 }}
            </td>
            <td class="px-6 py-4">
                {{ $report->usdt_count ?? 0 }}
            </td>
            <td class="px-6 py-4">
                {{ $report->garantex_count ?? 0 }}
            </td>
            <td class="px-6 py-4">
                {{ $report->btc_count ?? 0 }}
            </td>
            <td class="px-6 py-4">
                {{ $report->eth_count ?? 0 }}
            </td>
            <td class="px-6 py-4">
                {{ $report->remainder_capital->value() ?? 0 }}
            </td>
        </tr>
        </tbody>
    </table>
</div>

</x-layouts.base>
