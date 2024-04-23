<x-layouts.auth>

    <x-slot:title>
        Потверждение почты
    </x-slot:title>

    <x-card>
        <x-card.body>
            <div class="text-indigo-600 hover:text-indigo-500">
                Перейдите по ссылке из письма
            </div>

            <div class="pt-4 text-indigo-600 hover:text-indigo-500">
                Или введите код потверждения:

                <x-form action="{{ route('email.confirm', $email->uuid) }}" method="post" class="mt-3">
                    <div class="grid grid-cols-5 gap-x-4">
                        <div class="col-span-3">
                            <x-form.text name="code" placeholder="123456" inputmode="decimal" autofocus></x-form.text>
                        </div>

                        <div class="col-span-2">
                            <x-button type="submit">
                                Потвердить
                            </x-button>
                        </div>
                    </div>
                </x-form>
            </div>
        </x-card.body>
    </x-card>

    @unless(session('email-confirmation-sent'))
        <x-slot:crosslink>
            <x-link to="#" x-data x-on:click.prevent="$refs.form.submit()">
                Отправить еще раз

                <x-form class="d-none" x-ref="form" action="{{ route('email.send', $email->uuid) }}"
                        method="post"></x-form>
            </x-link>
        </x-slot:crosslink>
    @endunless
</x-layouts.auth>
