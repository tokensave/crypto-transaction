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
        return view('dashboard.check', compact('deals','profit', 'activeCount'));
    }

    public function capital(CapitalChangeRequest $request, DealService $dealService)
    {
        $dealService->changeUserCapital($request->validated(), $request->user());
        return back();
    }

    public function updateMoneyCapitalUser(Request $request)
    {
        $capital = $request->user()->money_capital->value();
        $update_capital = $request->user()->update(['money_capital' => $request->only('update_capital')]);
        return view('dashboard.capital.update', compact('update_capital', 'capital'));
    }

    public function calculate(Request $request, DealService $dealService)
    {
        $result = $dealService->calculate($request->first_num, $request->second_num);
        return view('dashboard.index', compact('result'));
    }
}
