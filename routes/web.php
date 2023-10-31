<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;
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

// routes/web.php

Route::resource('lapangan', LapanganController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('booking', BookingController::class);
Route::resource('event', EventController::class);
Route::resource('/', LandingController::class);
Route::get('/informasi', [LandingController::class,'informasi']);

