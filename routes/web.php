<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Players;
use App\Http\Livewire\Teams;
use App\Http\Livewire\Championships;
use App\Http\Livewire\Ranking;
use App\Http\Livewire\Dashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })/*->middleware('auth')*/;
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })/*->middleware(['auth'])*/->name('dashboard');

    Route::get('/jogadores', Players::class)->name('jogadores');

    Route::get('/times', Teams::class)->name('times');

    Route::get('/campeonatos', Championships::class)->name('campeonatos');

    Route::get('/ranking', Ranking::class)->name('ranking');

    Route::get('/dashboardCampeonatos', Dashboard::class)->name('dashboardCampeonatos');

});



require __DIR__.'/auth.php';
