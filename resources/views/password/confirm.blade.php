<x-layouts.auth>

    <x-slot:title>
        Потверждение
    </x-slot:title>

    <x-card>
        <x-card.body>
            <div class="text-indigo-600 hover:text-indigo-500">
                Перейдите по ссылке из письма, чтобы сбросить пароль.
            </div>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        <x-link to="{{ route('login') }}">
            Войти
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>
