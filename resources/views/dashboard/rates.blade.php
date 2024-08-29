
        <div class="flex justify-center my-8">
            <div class="text-white text-center bg-gray-900 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Текущие курсы криптовалют</h2>
                <ul>
                    @foreach($cryptoRates as $pair => $rate)
                        <li class="mb-2">
                            <span class="font-semibold">{{ $pair }}:</span>
                            <span>{{ $rate ? number_format($rate, 2) : 'Не доступно' }} USD</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
