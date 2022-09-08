<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Players;
use App\Http\Livewire\Teams;
use App\Http\Livewire\Championships;
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

    // >>> insira suas rotas aqui !!!!! <<<
    
    Route::get('/', function () {
        return view('dashboard');
    })/*->middleware('auth')*/;
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })/*->middleware(['auth'])*/->name('dashboard');

    Route::get('/players', Players::class);

    Route::get('/teams', Teams::class);

    Route::get('/championships', Championships::class);
});

/*Route::get('/criar-player', function () {
    return view('players.create');
});*/


Route::get('/dale', function() {
    return view('dale');
});


require __DIR__.'/auth.php';
