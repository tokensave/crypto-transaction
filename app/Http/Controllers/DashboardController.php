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
        return view('dashboard.check', compact('deals'));
    }

    public function capital(CapitalChangeRequest $request, DealService $dealService)
    {
        $dealService->changeUserCapital($request->validated(), $request->user());
        return back();
    }

    public function calculate(Request $request, DealService $dealService)
    {
        $value = $request->only('calculate');
        $deals = $request->user()->deals()->get();
        $profit = null;
        $activeCount = null;
        switch ($value['calculate']) {
            case 'profit':
                $profit = $dealService->calculateProfit($deals);
                break;
            case 'active':
                $activeCount = $dealService->calculateActive($deals);
                break;
        }
        return view('dashboard.check',  compact('deals', 'profit', 'activeCount'));
    }

    public function getUsers(Request $request): \Illuminate\Database\Eloquent\Collection
    {

        return User::all();
    }
}
