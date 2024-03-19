<x-layouts.auth>

    <x-slot:title>
        Войти в аккаунт
    </x-slot:title>

    @auth
        <div class="py-4 text-center text-indigo-600">
            {{ Auth::user()->email }}
        </div>
    @endauth

    <x-card>
        <x-card.body>
            <x-form action="{{ route('login.store') }}" method="post">

                <x-form.item>
                    <x-form.label>Почта</x-form.label>
                    <x-form.text name="email" placeholder="mail@example.com" autofocus/>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Пароль</x-form.label>
                    <x-form.text type="password" name="password" placeholder="******"/>
                </x-form.item>

                <x-form.item>
                    <div class="flex justify-between">

                        <div>
                            <x-form.checkbox name="remember" lable="Remember me">Запомнить меня</x-form.checkbox>
                        </div>

                        <div>
                            <x-link to="{{ route('password') }}" class="text-sm">
                                Забыли пароль?
                            </x-link>
                        </div>

                    </div>
                </x-form.item>

                <x-button type="submit">Войти</x-button>

            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        Не зарегистрированы?

        <x-link to="{{ route('registration') }}">
            Регистрация
        </x-link>
    </x-slot:crosslink>

</x-layouts.auth>
