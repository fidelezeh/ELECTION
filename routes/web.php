<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DetailReferentielController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('portail');
});

Route::view('login', 'auth.login')->name('login');
Route::view('portail', 'portail')->name('portail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::view('support', 'support')->name('support');


    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('/compte', [UserController::class, 'create'])->name('user-create');
//    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('referentiels', ReferentielController::class);
    Route::prefix('referentiel')
        ->group(function() {
            Route::get('/detail/{referentiel}', [ReferentielController::class,'indexSousReferentiel'])->name('sousRef.index');
        });

    Route::resource('detailreferentiel', DetailReferentielController::class);
    Route::prefix('detailreferentiels')
        ->group(function() {
            Route::get('/creation/{referentiel}', [DetailReferentielController::class,'createDetailReferentiel'])->name('sousRef.create');
        });

    Route::resource('election', ElectionController::class);
});

require __DIR__.'/auth.php';
