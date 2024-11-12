<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\User\Settings\MoneyCapitalController;
use App\Http\Controllers\User\Settings\PasswordController as UserPasswordController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\SettingsController;
use App\Models\Email;
use App\Models\User;
use App\Notifications\Email\ConfirmEmailNotification;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::redirect('/', '/registration');

Route::middleware('guest')->group(function () {
    Route::view('/registration', 'registration.index')->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    Route::view('/login', 'login.index')->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::view('/password', 'password.index')->name('password');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    Route::view('/password/confirm', 'password.confirm')->name('password.confirm');
    Route::get('/password/{password:uuid}', [PasswordController::class, 'edit'])->name('password.edit')->whereUuid('password');
    Route::post('/password/{password:uuid}', [PasswordController::class, 'update'])->name('password.update')->whereUuid('password');
});


    Route::get('email/confirmation', [EmailController::class, 'confirmation'])->name('email.confirmation')->middleware('auth');
    Route::any('email/{email:uuid}/confirm', [EmailController::class, 'confirm'])->name('email.confirm')->whereUuid('email');
    Route::post('email/{email:uuid}/send', [EmailController::class, 'send'])->name('email.send')->whereUuid('email');


Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['auth', 'online'])->group(function () {
    Route::redirect('/user', '/user/settings')->name('user');
    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');
    Route::get('/user/settings/profile', [ProfileController::class, 'edit'])->name('user.settings.profile.edit');
    Route::post('/user/settings/profile', [ProfileController::class, 'update'])->name('user.settings.profile.update');
    Route::get('/user/settings/password', [UserPasswordController::class, 'edit'])->name('user.settings.password.edit');
    Route::post('/user/settings/password', [UserPasswordController::class, 'update'])->name('user.settings.password.update');
    Route::get('/user/settings/capital', [MoneyCapitalController::class, 'edit'])->name('user.settings.capital.edit');
    Route::post('/user/settings/capital', [MoneyCapitalController::class, 'update'])->name('user.settings.capital.update');

    Route::middleware('email.confirm')->group(function () {
        Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');
        Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
        Route::get('/dashboard/check', [DashboardController::class, 'check'])->name('dashboard.check');
        Route::get('/dashboard/check/{id}/edit', [DashboardController::class, 'editDeal'])->name('dashboard.deals.edit');
        Route::put('/dashboard/check/{id}', [DashboardController::class, 'updateDeal'])->name('dashboard.deals.update');
        Route::delete('/dashboard/check/{id}', [DashboardController::class, 'deleteDeal'])->name('dashboard.deals.delete');

        Route::post('/dashboard/capital', [DashboardController::class, 'capital'])->name('dashboard.capital');
        Route::post('/dashboard/check/capital/change', [DashboardController::class, 'updateMoneyCapitalUser'])->name('dashboard.capital.update');
        Route::get('/dashboard/check/pdf', [DashboardController::class, 'downloadDeals'])->name('dashboard.deals.download');

        Route::view('/dashboard/tools', 'dashboard.tools')->name('dashboard.tools');
        Route::post('/dashboard/tools/calculate', [DashboardController::class, 'calculate'])->name('dashboard.calculate');
        Route::post('/dashboard/tools/calculate/cross', [DashboardController::class, 'crossCalculate'])->name('dashboard.calculate.cross');

//        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::post('/dashboard/capital', [DashboardController::class, 'capital'])->name('dashboard.capital');
        Route::post('/dashboard/check/capital/change', [DashboardController::class, 'updateMoneyCapitalUser'])->name('dashboard.capital.update');
        Route::get('/dashboard/check/pdf', [DashboardController::class, 'downloadDeals'])->name('dashboard.deals.download');

        Route::view('/report', 'report.index')->name('report.index');
        Route::get('/report/info', [ReportController::class, 'info'])->name('report.info');

    });
});


Route::get('/social/{driver}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');

Route::get('/social/{driver}/callback', [SocialController::class, 'callback'])->name('social.callback');



