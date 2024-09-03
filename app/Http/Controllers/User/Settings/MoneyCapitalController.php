<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\MoneyCapital\CapitalChangeRequest;
use Illuminate\Http\Request;

class MoneyCapitalController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('user.settings.capital.edit', [
            'user' => $user
        ]);
    }

    public function update(CapitalChangeRequest $request)
    {
        $user = $request->user();

        $data = $request->only([
            'money_capital',
        ]);

        $user->update($data);

        return to_route('user.settings');
    }
}
