<x-layouts.base>
    <x-menu>
        <x-menu.block>
            <x-menu.button type="button"/>
            <x-menu.option>
                <x-menu.link to="{{ route('dashboard.index') }}">
                    Главная панель
                </x-menu.link>
                <x-menu.link to="{{ route('dashboard.check') }}">
                    Сделки
                </x-menu.link>
                <x-menu.link to="{{ route('report.index') }}">
                    Отчет
                </x-menu.link>
                <x-menu.link to="{{ route('dashboard.tools') }}">
                    Инструменты
                </x-menu.link>
                <x-menu.link to="{{ route('user.settings') }}">
                    Настройки
                </x-menu.link>
                <x-menu.link name="logout">
                    Выйти
                </x-menu.link>
            </x-menu.option>
        </x-menu.block>
    </x-menu>

    <div class="flex flex-col lg:flex-row justify-center my-8 gap-y-4 lg:gap-x-10 px-4">
        <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto pt-5">
            <p>Калькулятор спреда</p>
        </div>
        <form action="{{ route('dashboard.calculate') }}" method="POST"
              class="flex flex-col lg:flex-row items-center justify-center gap-y-4 lg:gap-x-4 bg-gray-900 p-4 rounded-lg w-full lg:w-auto">
            @csrf
            <x-table.text type="text" name="first_num" placeholder="Первое число"/>
            <x-table.text type="text" name="second_num" placeholder="Второе число"/>
            <button type="submit"
                    class="w-full lg:w-auto px-10 py-2 ml-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Посчитать
            </button>
        </form>
    </div>

    <div class="flex justify-center my-8 px-4">
        @isset($result)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат : {{ number_format($result, 2)? : null }} %</p>
            </div>
        @endisset
    </div>

    <div class="flex flex-col lg:flex-row justify-center my-8 gap-y-4 lg:gap-x-10 px-4">
        <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto pt-5">
            <p>Калькулятор спреда кросс конвертации</p>
        </div>
        <form action="{{ route('dashboard.calculate.cross') }}" method="POST"
              class="flex flex-col lg:flex-row items-center justify-center gap-y-4 lg:gap-x-4 bg-gray-900 p-4 rounded-lg w-full lg:w-auto">
            @csrf
            <x-table.text type="text" name="course_buy" placeholder="Курс закупа"/>
            <x-table.text type="text" name="sum_buy" placeholder="Сумма закупа"/>
            <select name="active_buy"
                    class="block w-full rounded-md border-0 py-2 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 bg-gray-900 text-white">
                <option value="" disabled selected>Актив закупа</option>
                @foreach(App\Enums\CryptoActiveEnum::select() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <select name="active_sell"
                    class="block w-full rounded-md border-0 py-2 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 bg-gray-900 text-white">
                <option value="" disabled selected>Актив продажи</option>
                @foreach(App\Enums\CryptoActiveEnum::select() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <x-table.text type="text" name="course_sell" placeholder="Курс продажи"/>
            <button type="submit"
                    class="w-full lg:w-auto px-10 py-2 ml-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Посчитать
            </button>
        </form>
    </div>

    <div class="flex justify-center my-8 px-4">
        @isset($profit_rub)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат в рублях: {{ number_format($profit_rub, 2)? : null }} RUB</p>
            </div>
        @endisset
        @isset($profit)
            <div class="text-white text-center bg-gray-900 p-2 w-full lg:w-auto">
                <p>Результат в процентах: {{ number_format($profit, 2)? : null }} %</p>
            </div>
        @endisset
    </div>

</x-layouts.base>
