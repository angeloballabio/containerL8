<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Operazioni;
use App\Http\Livewire\Fornitori;
use App\Http\Livewire\Destinatari;
use App\Http\Livewire\Trasportatori;
use App\Http\Livewire\Consegne;
use App\Http\Livewire\Dogane;
use App\Http\Livewire\Compagnie;
use App\Http\Livewire\Containers;
use App\Http\Livewire\Valute;
use App\Http\Livewire\Resa;
use App\Http\Livewire\GeneraDistinta;
use App\Http\Controllers\Mandati;
use App\Http\Controllers\Bollettino;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/operazioni', Operazioni::class)->name('operazioni');
Route::get('/fornitori', Fornitori::class)->name('fornitori');
Route::get('/destinatari', Destinatari::class)->name('destinatari');
Route::get('/trasportatori', Trasportatori::class)->name('trasportatori');
Route::get('/consegne', Consegne::class)->name('consegne');
Route::get('/dogane', Dogane::class)->name('dogane');
Route::get('/compagnie', Compagnie::class)->name('compagnie');
Route::get('/containers', Containers::class)->name('containers');
Route::get('/valute', Valute::class)->name('valute');
Route::get('/resa', Resa::class)->name('resa');
Route::get('/mandati/{id}', [Mandati::class, 'index'])->name('mandati');
Route::get('/mandati/pdf/{id}', [Mandati::class, 'stampaPdf'])->name('mandati.pdf');
Route::get('/bollettino/{id}', [Bollettino::class, 'index'])->name('bollettino');
Route::get('/bollettino/pdf/{id}', [Bollettino::class, 'stampaPdf'])->name('bollettino.pdf');
Route::get('/genera_distinta/{id}', GeneraDistinta::class)->name('genera.distinta');

