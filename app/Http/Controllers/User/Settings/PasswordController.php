<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Password\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\PasswordConfirmation;
use App\Notifications\Password\PasswordConfirmationNotification;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('user.settings.password.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(UpdateRequest $request)
    {
       $user = $request->user();

       $confirmation = PasswordConfirmation::create([
        'user_id' => $user->id,
        'code' => str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT),
        'payload' => [
            'password' => bcrypt($request->input('password')),
            'password_at' => now(),
        ],
        'provider' => $request->input('provider'),
        'expires_at' => now()->addMinutes(30),
    ]);
    
    $user->notify(new PasswordConfirmationNotification($confirmation));

        return to_route('user.settings.password.confirm', $confirmation);
    }

    public function confirm(Request $request, PasswordConfirmation $confirmation)
    {
        return view('user.settings.password.confirm', [
            'confirmation' => $confirmation
        ]);
    }

    public function verify(Request $request, PasswordConfirmation $confirmation)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        if ($confirmation->expires_at->isPast()) {
            return back()->withErrors(['code' => 'Код подтверждения истек']);
        }

        if ($request->input('code') !== $confirmation->code) {
            return back()->withErrors(['code' => 'Неверный код подтверждения']);
        }

        // Применяем изменения
        $user = $confirmation->user;
        $user->update($confirmation->payload);
        
        // Удаляем использованное подтверждение
        $confirmation->delete();

        return to_route('user.settings')->with('success', 'Пароль успешно изменен');
    }
}
