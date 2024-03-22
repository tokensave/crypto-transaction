<x-layouts.base>
    <div class="lg:pl-72 bg-gray-900">
        <div
            class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 px-4 lg:px-8 bg-gray-900 text-white justify-end">
            <div class="flex items-center gap-x-4 lg:gap-x-6 bg-gray-900">

                <div x-data="{ open: false}" class="relative">
                    <button x-on:click="open = true" type="button" class="-m-1.5 flex items-center p-1.5"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full bg-gray-50"
                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                             alt="">
                        <span class="hidden lg:flex lg:items-center">

                                <span class="ml-4 text-sm font-semibold leading-6" aria-hidden="true">
                                   {{ Auth::user()->first_name }}
                                </span>

                                <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                    </button>

                    <div x-cloak x-show="open" x-on:click.outside="open = false"
                         class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                        <a href="{{ route('dashboard.index') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Главная панель
                        </a>

                        <a href="{{ route('dashboard.check') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Сделки
                        </a>

                        <a href="{{ route('user.settings') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                           role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Настройки
                        </a>

                        <a href="" x-on:click.prevent="$refs.logout.submit()"
                           class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1"
                           id="user-menu-item-1">
                            Выйти
                            <x-form x-ref="logout" action="{{ route('logout') }}" method="post" class="hidden"></x-form>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="flex items-center justify-center min-h-screen bg-gray-900">
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

                </x-table.trow>

                @foreach($deals as $deal)
                <x-table.trow>
                    @foreach($deals as $deal)
                        <x-table.trow>
                            <x-table.tbody>{{ $deal->active->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->action->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->course }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->sum }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->provider->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->crypto_exchange->name() }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->deal_id }}</x-table.tbody>
                            <x-table.tbody>{{ $deal->course * $deal->sum }}</x-table.tbody> <!-- Результат вычисления -->
                        </x-table.trow>
                    @endforeach

                </x-table.trow>
                @endforeach
            </x-table>
        </div>
    </div>

</x-layouts.base>
