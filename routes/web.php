<?php

use App\Http\Controllers\Admin\PemasukanController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'totalPemasukan' => Pemasukan::sum('jumlah'),
            'totalPengeluaran' => Pengeluaran::sum('jumlah'),
        ]);
    })->name('dashboard');

    Route::resource('pemasukan', PemasukanController::class)->except('show');
    Route::resource('pengeluaran', PengeluaranController::class)->except('show');
});
