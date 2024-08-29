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

    <div class="flex items-up justify-center min-h-screen bg-gray-900">
        <div class="col-span-12">
            <x-table>

                <x-table.trow>

                    <x-table.thead>Актив</x-table.thead>
                    <x-table.thead>Действие с активом</x-table.thead>
                    <x-table.thead>Курс</x-table.thead>
                    <x-table.thead>Сумма</x-table.thead>
                    <x-table.thead>Банк</x-table.thead>
                    <x-table.thead>Биржа</x-table.thead>
                    <x-table.thead>Идентификатор сделки</x-table.thead>
                    <x-table.thead>Количество актива</x-table.thead>
                    <x-table.thead>Дата</x-table.thead>

                </x-table.trow>

                <x-table.trow>
                    @foreach($deals as $deal)
                        <x-table.trow>
                            <x-table.tbody>{{ $deal->active->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->action->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->course->value() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->sum->value() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->provider->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->crypto_exchange->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->deal_id }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->active_count }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->created_at }}</x-table.tbody>
                        </x-table.trow>
                    @endforeach
                </x-table.trow>
            </x-table>
        </div>
    </div>


</x-layouts.base>
