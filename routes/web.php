<?php

use App\Http\Livewire\CrudAssociate;
use App\Http\Livewire\CrudSon;
use App\Http\Livewire\PeriodLivewire;
use Illuminate\Support\Facades\Route;

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
//ruta publica
Route::get('/', function () {
    return view('welcome');
});

//rutas protegidas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/associates',CrudAssociate::class)->name('associates');
    Route::get('/sons',CrudSon::class)->name('sons');
    Route::get('/periods',PeriodLivewire::class)->name('periods');
});
