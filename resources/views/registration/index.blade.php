<x-layouts.auth>

    <x-slot:title>
        TokenSave Company
    </x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('registration.store') }}" method="post">

                <x-form.item>
                    <x-form.label>Имя</x-form.label>
                    <x-form.text name="first_name" placeholder="Ivan" autofocus/>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Почта</x-form.label>
                    <x-form.text name="email" placeholder="mail@example.com"/>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Придумай пароль</x-form.label>
                    <x-form.text type="password" name="password" placeholder="******"/>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Повтори пароль</x-form.label>
                    <x-form.text type="password" name="password_confirmation" placeholder="******"/>
                </x-form.item>

                <x-form.item>
                    <x-form.checkbox name="agreement" lable="Remember me">Принимаю соглашение</x-form.checkbox>
                </x-form.item>

                <x-button type="submit">Зарегистрироваться</x-button>

            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        Уже зарегистрированы?

        <x-link to="{{ route('login') }}">
            Войти
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>
