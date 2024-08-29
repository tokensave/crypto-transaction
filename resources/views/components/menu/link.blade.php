@props([
    'to' => '#',
    'name' => ''
    ])

@if($name)
    <a href="" {{ $name }} x-on:click.prevent="$refs.logout.submit()" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-1">
        Выйти
        <x-form x-ref="logout" action="{{ route('logout') }}" method="post" class="hidden"></x-form>
    </a>
@else
    <a href="{{ $to }}" {{ $attributes }} class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">
        {{ $slot }}
    </a>
@endif
