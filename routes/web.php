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
use App\Http\Livewire\ImportaFatturaManuale;
use App\Http\Controllers\Mandati;
use App\Http\Controllers\Bollettino;
use App\Http\Controllers\StampaDistinta;
use App\Http\Controllers\ImportaFattura;
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

Route::get('/operazioni', Operazioni::class)->name('operazioni')->middleware('auth');
Route::get('/fornitori', Fornitori::class)->name('fornitori')->middleware('auth');
Route::get('/destinatari', Destinatari::class)->name('destinatari')->middleware('auth');
Route::get('/trasportatori', Trasportatori::class)->name('trasportatori')->middleware('auth');
Route::get('/consegne', Consegne::class)->name('consegne')->middleware('auth');
Route::get('/dogane', Dogane::class)->name('dogane')->middleware('auth');
Route::get('/compagnie', Compagnie::class)->name('compagnie')->middleware('auth');
Route::get('/containers', Containers::class)->name('containers')->middleware('auth');
Route::get('/valute', Valute::class)->name('valute')->middleware('auth');
Route::get('/resa', Resa::class)->name('resa')->middleware('auth');
Route::get('/mandati/{id}', [Mandati::class, 'index'])->name('mandati')->middleware('auth');
Route::get('/mandati/pdf/{id}', [Mandati::class, 'stampaPdf'])->name('mandati.pdf')->middleware('auth');
Route::get('/bollettino/{id}', [Bollettino::class, 'index'])->name('bollettino')->middleware('auth');
Route::get('/bollettino/pdf/{id}', [Bollettino::class, 'stampaPdf'])->name('bollettino.pdf')->middleware('auth');
Route::get('/genera_distinta/{id}', GeneraDistinta::class)->name('genera.distinta')->middleware('auth');
Route::get('/stampa_distinta/{id}', [StampaDistinta::class, 'index'])->name('stampa.distinta')->middleware('auth');
Route::get('/distinta/pdf/{id}', [StampaDistinta::class, 'stampaPdf'])->name('distinta.pdf')->middleware('auth');
Route::get('/importa_fattura/{id}', [ImportaFattura::class, 'importa'])->name('importa_fattura')->middleware('auth');
Route::get('/importa_fattura_manuale/{id}/{f_id}', ImportaFatturaManuale::class)->name('importa_fattura_manuale')->middleware('auth');
