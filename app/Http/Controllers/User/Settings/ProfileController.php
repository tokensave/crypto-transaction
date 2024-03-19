<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Profile\UpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('user.settings.profile.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateRequest $request)
    {
        $user = $request->user();

        $data = $request->only([
            'first_name',
            'last_name',
            'middle_name',
            'crypto_exchange'
        ]);

        $user->update($data);

        return to_route('user.settings');
    }
}
