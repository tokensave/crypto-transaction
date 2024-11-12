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
                    <x-table.thead>Комиссия биржи</x-table.thead>
                    <x-table.thead>Дата</x-table.thead>
                    <x-table.thead>Редактировать</x-table.thead>
                    <x-table.thead>Удалить</x-table.thead>


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
                            <x-table.tbody>{{ $deal->cost }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->created_at }}</x-table.tbody>
                            <x-table.tbody>
                                <a href="{{ route('dashboard.deals.edit', ['id' => $deal->id]) }}" class="flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Pencil-Circle--Streamline-Ultimate" height="24" width="24"><desc>Pencil Circle Streamline Icon: https://streamlinehq.com</desc><defs></defs><path d="M12 23.5A11.5 11.5 0 1 0 0.5 12 11.5 11.5 0 0 0 12 23.5Z" fill="#9feaff" stroke-width="1"></path><path d="M20.132 3.868A11.5 11.5 0 0 0 3.868 20.132Z" fill="#dff9ff" stroke-width="1"></path><path d="M12 23.5A11.5 11.5 0 1 0 0.5 12 11.5 11.5 0 0 0 12 23.5Z" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke-width="1"></path><path d="m14.8319002332 6.3411294417 1.8409522872 -1.8402455479 2.8278840536 2.8289700917 -1.8409522872 1.8402455478Z" fill="#9feaff" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><path d="m5.711 18.29 4.948 -2.121 -2.827 -2.827 -2.121 4.948z" fill="#9feaff" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><path d="m17.66 9.169 -2.829 -2.828 -6.998 6.998 -0.001 0.003 2.827 2.827 0.002 -0.001 6.999 -6.999z" fill="#9feaff" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path></svg>
                                </a>
                            </x-table.tbody>
                            <x-table.tbody>
                                <form action="{{ route('dashboard.deals.delete', ['id' => $deal->id]) }}" method="POST" class="flex justify-center items-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Delete-2--Streamline-Ultimate" height="24" width="24"><desc>Delete 2 Streamline Icon: https://streamlinehq.com</desc><defs></defs><path d="M0.5 12a11.5 11.5 0 1 0 23 0 11.5 11.5 0 1 0 -23 0" fill="#9feaff" stroke-width="1"></path><path d="M3.868 20.132A11.5 11.5 0 0 1 20.132 3.868Z" fill="#dff9ff" stroke-width="1"></path><path d="M0.5 12a11.5 11.5 0 1 0 23 0 11.5 11.5 0 1 0 -23 0" fill="none" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><path d="m7 7 10 10" fill="none" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><path d="M17 7 7 17" fill="none" stroke="#00303e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path></svg>
                                    </button>
                                </form>
                            </x-table.tbody>
                        </x-table.trow>
                    @endforeach
                </x-table.trow>
            </x-table>

            <div class="mt-10 text-right">
                <a href="{{ route('dashboard.deals.download') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Скачать сделки
                </a>
            </div>
        </div>
    </div>

    <div x-data="{ open: false, message: '', type: '' }"
         x-show="open"
         x-init="() => {
             @if (session('success'))
                 open = true;
                 message = '{{ session('success') }}';
                 type = 'success';
             @elseif (session('error'))
                 open = true;
                 message = '{{ session('error') }}';
                 type = 'error';
             @endif
         }"
         x-transition
         class="fixed bottom-4 right-4 p-4 rounded shadow-lg"
         :class="{
             'bg-blue-500 text-white': type === 'success',
             'bg-red-500 text-white': type === 'error'
         }"
         x-on:click.outside="open = false">
        <span x-text="message"></span>
    </div>


</x-layouts.base>
