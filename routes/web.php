<?php

use App\Http\Controllers\VaccinationController;
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
Route::get('/vaccination/daily/breakdown-by-district/', [VaccinationController::class, 'showDailyBreakdownByDistrict'])->name('daily-breakdown-by-district');
Route::get('/vaccination/daily/breakdown-by-district/get-data', [VaccinationController::class, 'getDailyBreakdownByDistrictData'])->name('get-daily-breakdown-by-district-data');
