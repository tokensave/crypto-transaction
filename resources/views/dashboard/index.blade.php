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

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <form action="{{ route('dashboard.store') }}" method="POST">
        @csrf
        <div class="flex items-center justify-center min-h-screen bg-gray-900">
            <div class="col-span-12">
                <table class="table-auto text-gray-400 border-separate space-y-6 text-sm">
                    <x-table.header-row>
                        <x-table.header> Актив</x-table.header>
                        <x-table.header> Биржа</x-table.header>
                        <x-table.header> Действие с активом</x-table.header>
                        <x-table.header> Курс</x-table.header>
                        <x-table.header> Сумма</x-table.header>
                        <x-table.header> Банк</x-table.header>
                        <x-table.header> Идентификатор сделки</x-table.header>
                        <x-table.header> Добавить</x-table.header>
                    </x-table.header-row>

                    <x-table.header-row>
                        <x-table.row-cell>
                            <x-form.select name="active" :options="App\Enums\CryptoActiveEnum::select()"
                                           class="bg-transparent"/>
                        </x-table.row-cell>

                        <x-table.row-cell>
                            <x-form.select name="crypto_exchange" :options="App\Enums\CryptoExchangeEnum::select()"
                                           class="bg-transparent"/>
                        </x-table.row-cell>

                        <x-table.row-cell>
                            <x-form.select name="action" :options="App\Enums\ActionsActiveEnum::select()"
                                           class="bg-transparent"/>
                        </x-table.row-cell>

                        <x-table.row-cell>
                            <input type="text" name="course" class="bg-transparent border-none text-white w-full"
                                   placeholder="Введите курс">
                        </x-table.row-cell>

                        <x-table.row-cell>
                            <input type="text" name="sum" class="bg-transparent border-none text-white w-full"
                                   placeholder="Введите сумму">
                        </x-table.row-cell>

                        <x-table.row-cell>
                            <x-form.select name="provider" :options="App\Enums\BanksEnum::select()"
                                           class="bg-transparent"/>
                        </x-table.row-cell>

                        <x-table.row-cell>
                            <input type="text" name="deal_id" class="bg-transparent border-none text-white w-full"
                                   placeholder="Введите id сделки">
                        </x-table.row-cell>

                        <td class="p-3 flex justify-center items-center">
                            <button type="submit" class="text-gray-400 hover:text-gray-100 mr-2 mt-3">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                        </td>

                    </x-table.header-row>
                </table>
            </div>
        </div>
    </form>
</x-layouts.base>
