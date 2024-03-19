<x-layouts.auth>

    <x-slot:title>
        Восстановление пароля
    </x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('password.store') }}" method="post">

                <x-form.item>
                    <x-form.label>Почта</x-form.label>
                    <x-form.text name="email" placeholder="mail@example.com" autofocus/>
                </x-form.item>

                <x-button type="submit">Продолжить</x-button>

            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        <x-link to="{{ route('login') }}">
            Войти
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>
