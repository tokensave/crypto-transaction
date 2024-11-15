<x-layouts.base>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl text-white font-bold mb-4">Редактировать сделку</h1>

        <form action="{{ route('dashboard.deals.update', ['id' => $deal->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Здесь добавьте поля для редактирования сделки -->
            <div class="mb-4">
                <x-table.select name="active" :options="App\Enums\CryptoActiveEnum::select()" class="bg-transparent" value="{{ old('active', $deal->active) }}"/>
            </div>

            <div class="mb-4">
                <x-table.select name="crypto_exchange" :options="App\Enums\CryptoExchangeEnum::select()" class="bg-transparent"  value="{{ old('crypto_exchange', $deal->crypto_exchange->name()) }}"/>
            </div>

            <div class="mb-4">
                <x-table.select name="action" :options="App\Enums\ActionsActiveEnum::select()" class="bg-transparent"  value="{{ old('active', $deal->action) }}"/>
            </div>

            <div class="mb-4">
                <x-table.text type="text" name="course" value="{{ old('course', $deal->course->value()) }}"/>
            </div>

            <div class="mb-4">
                <x-table.text type="text" name="sum" value="{{ old('sum', $deal->sum->value()) }}"/>
            </div>

            <div class="mb-4">
                <x-table.select name="provider" :options="App\Enums\BanksEnum::select()" class="bg-transparent" value="{{ old('provider', $deal->provider->name()) }}"/>
            </div>

            <div class="mb-4">
                <x-table.text type="text" name="cost" value="{{ old('cost', $deal->cost) }}"/>
            </div>

            <div class="mb-4">
                <x-table.text type="text" name="deal_id" value="{{ old('deal_id', $deal->deal_id) }}"/>
            </div>

            <div class="mb-4">
                <x-table.text type="text" name="created_at" value="{{ old('created_at', $deal->created_at) }}"/>
            </div>

            <button type="submit" class="w-full lg:w-auto px-10 py-2 bg-cyan-950 text-white rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Обновить сделку
            </button>
        </form>
    </div>
</x-layouts.base>
