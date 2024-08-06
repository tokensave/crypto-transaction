<x-layouts.base>
    <div>

        <div class="g:pl-72">
            <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 px-4 lg:px-8 bg-gray-900 text-white justify-end">

                <div class="flex justify-end flex-1 gap-x-4 self-stretch lg:gap-x-6">

                    <div class="flex items-center gap-x-4 lg:gap-x-6">

                        <div x-data="{ open: false}" class="relative">
                            <button x-on:click="open = true" type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-bitcoin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 6h8a3 3 0 0 1 0 6a3 3 0 0 1 0 6h-8" /><path d="M8 6l0 12" /><path d="M8 12l6 0" /><path d="M9 3l0 3" /><path d="M13 3l0 3" /><path d="M9 18l0 3" /><path d="M13 18l0 3" /></svg>
                                <span class="hidden lg:flex lg:items-center">

                                <span class="ml-4 text-sm font-semibold leading-6" aria-hidden="true">
                                   {{ Auth::user()->first_name }}
                                </span>

                                <svg class="ml-2 h-5 w-5 text-white-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            </button>

                            <div x-cloak x-show="open" x-on:click.outside="open = false" class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="{{ route('dashboard.index') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    Главная панель
                                </a>

                                <a href="{{ route('dashboard.check') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                                   role="menuitem" tabindex="-1" id="user-menu-item-0">
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
            </div>

            <x-user.email-confirmation-alert></x-user.email-confirmation-alert>

            <main class="py-10 ">
                <div class="px-4 sm:px-6 lg:px-8 ">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</x-layouts.base>
