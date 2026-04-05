<?php

use App\Livewire\Features;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Features\ListWarga;
use App\Livewire\Features\MyProfile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Features\ListLaporan;
use App\Livewire\Features\Warga\Laporan;
use App\Livewire\Features\Warga\Dashboard;
use App\Livewire\Features\Dashboard as DashboardAdmin;

Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('auth')->group(function () {
        Route::get('/register', Register::class)->name('register');
        Route::get('/login', Login::class)->name('login');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', DashboardAdmin::class)->name('admin.dashboard');
        Route::get('/list-laporan', Features\ListLaporan::class)->name('admin.list-laporan');
        Route::get('/list-warga', Features\ListWarga::class)->name('admin.list-warga');
        Route::get('/profile', Features\MyProfile::class)->name('admin.profile');
    });


    Route::middleware('auth')->prefix('warga')->group(function () {
        Route::get('/', Features\Warga\Dashboard::class)->name('warga.dashboard');
        Route::get('/laporan', Features\Warga\Laporan::class)->name('warga.laporan');
        Route::get('/profile', Features\Warga\MyProfile::class)->name('warga.profile');
    });




