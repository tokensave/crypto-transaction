<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\CalculateRequest;
use App\Http\Requests\Deal\StoreRequest;
use App\Http\Requests\User\Settings\MoneyCapital\CapitalChangeRequest;
use App\Models\Deal;
use App\Services\Deals\DealService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class DashboardController extends Controller
{
    public function index()
    {
        // Получаем данные из API Huobi
        $response = Http::get('https://api.huobi.pro/market/tickers');

        // Преобразуем JSON ответ в массив
        $data = $response->json();

        // Выбираем нужные курсы криптовалют, например, BTC/USDT и ETH/USDT
        $cryptoRates = [
            'BTC/USDT' => $this->getCryptoRate($data, 'btcusdt'),
            'ETH/USDT' => $this->getCryptoRate($data, 'ethusdt'),
        ];
        return view('dashboard.index', compact('cryptoRates'));
    }

    private function getCryptoRate($data, $symbol)
    {
        foreach ($data['data'] as $ticker) {
            if ($ticker['symbol'] === $symbol) {
                return $ticker['close'];
            }
        }
        return null;
    }
    /**
     * @throws Throwable
     */
    public function store(StoreRequest $request, DealService $dealService)
    {
        $dealService->createDeal($request->validated(), $request->user());
        return redirect()->route('dashboard.check');
    }

    public function check(Request $request, DealService $dealService)
    {
        $deals = $dealService->getDeals($request->user());
        return view('dashboard.check', compact('deals'));
    }

    public function capital(CapitalChangeRequest $request, DealService $dealService)
    {
        $dealService->changeUserCapital($request->validated(), $request->user());
        return back();
    }

    public function calculate(CalculateRequest $request, DealService $dealService)
    {
        $result = $dealService->calculate($request->validated());
        return view('dashboard.index', compact('result'));
    }

    public function downloadDeals()
    {
        $deals = Deal::all();

        $pdf = PDF::loadView('deals.index', compact('deals'));

        return $pdf->download('deals.pdf');
    }
}
