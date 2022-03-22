<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\JawabanController;
use App\Models\Pertanyaan;
use App\Models\Profile;



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
    $profile = Profile::all();
    $kategori = DB::table('kategoris')->get();
    $pertanyaan = Pertanyaan::all();
    $count = DB::table('jawabans')->count();
    return view('partials.index', compact('profile','kategori','pertanyaan','count'));
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');

// Profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->middleware('auth');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->middleware('auth');
Route::put('/profile/edit/{profile_id}', [App\Http\Controllers\ProfileController::class, 'update'])->middleware('auth');

// Kategori
Route::resource('kategori', KategoriController::class) ->middleware('auth');

// pertanyaan
Route::resource('pertanyaan', PertanyaanController::class) ->middleware('auth');

// jawaban
Route::resource('jawaban', JawabanController::class) ->middleware('auth');



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {
//     return view('welcome.home');
// });
