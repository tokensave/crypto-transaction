<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\CapitalChangeRequest;
use App\Http\Requests\Deal\StoreRequest;
use App\Models\User;
use App\Services\Deals\DealService;
use Illuminate\Http\Request;
use Throwable;

class DashboardController extends Controller
{
    /**
     * @throws Throwable
     */
    public function store(StoreRequest $request, DealService $dealService)
    {
        $dealService->createDeal($request->validated());
        return redirect()->route('dashboard.check');
    }

    public function check(Request $request, DealService $dealService)
    {
        $deals = $dealService->getDeals($request->user());
        $profit = $dealService->calculateProfit($deals);
        $activeCount = $dealService->calculateActive($deals);
        $activeCapital = $dealService->activeCapitel($deals, $request->user(), $profit);
        return view('dashboard.check', compact('deals','profit', 'activeCount', 'activeCapital'));
    }

    public function capital(CapitalChangeRequest $request, DealService $dealService)
    {
        $dealService->changeUserCapital($request->validated(), $request->user());
        return back();
    }

    public function updateMoneyCapitalUser(Request $request)
    {
        $request->validate([
            'capital' => 'required|numeric|min:0',
        ]);
        // Обновляем капитал пользователя
        $request->user()->update(['money_capital' => $request->input('capital')]);
        // Возвращаемся на ту же страницу с сообщением об успешном обновлении
        return redirect()->back()->with('success', 'Капитал успешно обновлен');
    }

    public function calculate(Request $request, DealService $dealService)
    {
        $result = $dealService->calculate($request->first_num, $request->second_num);
        return view('dashboard.index', compact('result'));
    }
}
