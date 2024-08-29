<div {{ $attributes }} x-cloak x-show="open" x-on:click.outside="open = false" class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        {{ $slot }}

    {{--            <a href="{{ route('dashboard.index') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">--}}
{{--                Главная панель--}}
{{--            </a>--}}
{{--            <a href="{{ route('dashboard.check') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">--}}
{{--                Сделки--}}
{{--            </a>--}}
{{--            <a href="{{ route('user.settings') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">--}}
{{--                Настройки--}}
{{--            </a>--}}

</div>
