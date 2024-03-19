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

        dd($deal);
        //отобразить уведомление что все ок
    }
}
