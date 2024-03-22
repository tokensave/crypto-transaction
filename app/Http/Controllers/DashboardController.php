<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\StoreRequest;
use App\Models\Deal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function store(StoreRequest $request)
    {
        $deal = Deal::query()->create($request->validated());

        //отобразить уведомление что все ок
        return to_route('dashboard.check');
    }

    public function check(Request $request)
    {
        $user = $request->user();
        $deals = $user->deals()->get();

        return view('dashboard.check', compact('deals'));
    }
}
