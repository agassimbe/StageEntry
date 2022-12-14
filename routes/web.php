<?php

use App\Http\Controllers\Front\CandidatureController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('accueil');
// });
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/offres', [CandidatureController::class, 'index'])->name('offre.list');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/candidature/{offre}', [CandidatureController::class, 'show'])->name('candidature.show');
    Route::post('/candidature', [CandidatureController::class, 'store'])->name('candidature.store');
    Route::get('/user/{user}/candidatures', [CandidatureController::class, "user_candiatures"])->name("user.candidatures");

});

require __DIR__.'/auth.php';
