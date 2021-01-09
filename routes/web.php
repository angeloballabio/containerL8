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
use App\Http\Livewire\FatturaSemiAutomatico;
use App\Http\Controllers\Mandati;
use App\Http\Controllers\Bollettino;
use App\Http\Controllers\StampaDistinta;
use App\Http\Controllers\ImportaFattura;
use App\Http\Controllers\StampaSanitari;

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
Route::get('/importa-fattura-manuale/{id}/{f_id}', ImportaFatturaManuale::class)->name('importa-fattura-manuale')->middleware('auth');
Route::get('/fattura-semi-automatico/{id}/{f_id}', FatturaSemiAutomatico::class)->name('fattura-semi-automatico')->middleware('auth');
Route::get('/StampaSanitari/{id}', [StampaSanitari::class, 'seleziona'])->name('stampa_sanitari.seleziona')->middleware('auth');
/* Route::get('/StampaSanitari/acciaio/{id}', [StampaSanitari::class, 'stampa_acciaio'])->name('stampa_sanitari.acciaio')->middleware('auth');
Route::get('/StampaSanitari/acciaio_inos/{id}', [StampaSanitari::class, 'stampa_acciaio_inox'])->name('stampa_sanitari.acciaio_inox')->middleware('auth');
Route::get('/StampaSanitari/posateria/{id}', [StampaSanitari::class, 'stampa_posateria'])->name('stampa_sanitari.posateria')->middleware('auth');
Route::get('/StampaSanitari/strumenti_cucina/{id}', [StampaSanitari::class, 'stampa_strumenti_cucina'])->name('stampa_sanitari.strumenti_cucina')->middleware('auth');
Route::get('/StampaSanitari/legno/{id}', [StampaSanitari::class, 'stampa_legno'])->name('stampa_sanitari.legno')->middleware('auth');
Route::get('/StampaSanitari/bambu/{id}', [StampaSanitari::class, 'stampa_bambu'])->name('stampa_sanitari.bambu')->middleware('auth');
Route::get('/StampaSanitari/ceramica/{id}', [StampaSanitari::class, 'stampa_ceramica'])->name('stampa_sanitari.ceramica')->middleware('auth');
Route::get('/StampaSanitari/carta/{id}', [StampaSanitari::class, 'stampa_carta'])->name('stampa_sanitari.carta')->middleware('auth');
Route::get('/StampaSanitari/pietra/{id}', [StampaSanitari::class, 'stampa_pietra'])->name('stampa_sanitari.pietra')->middleware('auth'); */
