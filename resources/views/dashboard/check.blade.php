<x-layouts.base>
    <x-menu>
        <x-menu.block>
            <x-menu.button type="button" />
            <x-menu.option>
                <x-menu.link to="{{ route('dashboard.index') }}">Главная панель</x-menu.link>
                <x-menu.link to="{{ route('dashboard.check') }}">Сделки</x-menu.link>
                <x-menu.link to="{{ route('report.index') }}">Отчет</x-menu.link>
                <x-menu.link to="{{ route('dashboard.tools') }}">Инструменты</x-menu.link>
                <x-menu.link to="{{ route('user.settings') }}">Настройки</x-menu.link>
                <x-menu.link name="logout">Выйти</x-menu.link>
            </x-menu.option>
        </x-menu.block>
    </x-menu>

    <div class="flex items-center justify-center min-h-screen bg-gray-900">
        <div class="col-span-12 w-full overflow-x-auto">
            <x-table>
                <!-- Header -->
                <x-table.header>
                    <x-table.header-cell>Актив</x-table.header-cell>
                    <x-table.header-cell>Действие</x-table.header-cell>
                    <x-table.header-cell class="hidden sm:table-cell">Курс</x-table.header-cell>
                    <x-table.header-cell>Сумма</x-table.header-cell>
                    <x-table.header-cell class="hidden md:table-cell">Банк</x-table.header-cell>
                    <x-table.header-cell class="hidden md:table-cell">Биржа</x-table.header-cell>
                    <x-table.header-cell class="hidden lg:table-cell">ID сделки</x-table.header-cell>
                    <x-table.header-cell class="hidden lg:table-cell">Количество</x-table.header-cell>
                    <x-table.header-cell class="hidden xl:table-cell">Комиссия</x-table.header-cell>
                    <x-table.header-cell>Дата</x-table.header-cell>
                    <x-table.header-cell>Редактировать</x-table.header-cell>
                    <x-table.header-cell>Удалить</x-table.header-cell>
                </x-table.header>

                <!-- Body -->
                <tbody>
                @foreach($deals as $deal)
                    <x-table.row>
                        <x-table.cell>{{ $deal->active->name() }}</x-table.cell>
                        <x-table.cell>{{ $deal->action->name() }}</x-table.cell>
                        <x-table.cell class="hidden sm:table-cell">{{ $deal->course->value() }}</x-table.cell>
                        <x-table.cell>{{ $deal->sum->value() }}</x-table.cell>
                        <x-table.cell class="hidden md:table-cell">{{ $deal->provider->name() }}</x-table.cell>
                        <x-table.cell class="hidden md:table-cell">{{ $deal->crypto_exchange->name() }}</x-table.cell>
                        <x-table.cell class="hidden lg:table-cell">{{ $deal->deal_id }}</x-table.cell>
                        <x-table.cell class="hidden lg:table-cell">{{ $deal->active_count }}</x-table.cell>
                        <x-table.cell class="hidden xl:table-cell">{{ $deal->cost }}</x-table.cell>
                        <x-table.cell>{{ $deal->created_at }}</x-table.cell>
                        <x-table.cell>
                            <a href="{{ route('dashboard.deals.edit', ['id' => $deal->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                </svg>
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <form action="{{ route('dashboard.deals.delete', ['id' => $deal->id]) }}" method="POST" class="flex justify-center items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
                </tbody>
            </x-table>

            <div class="mt-10 text-right">
                <a href="{{ route('dashboard.deals.download') }}" class="w-full lg:w-auto px-10 py-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
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
         class="fixed bottom-4 left-4 p-4 rounded shadow-lg"
         :class="{
             'bg-cyan-950 text-white': type === 'success',
             'bg-red-500 text-white': type === 'error'
         }"
         x-on:click.outside="open = false">
        <span x-text="message"></span>
    </div>
</x-layouts.base>
