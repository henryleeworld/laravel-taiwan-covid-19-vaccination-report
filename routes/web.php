<?php

use App\Http\Controllers\Covid19Controller;
use Illuminate\Support\Facades\Route;

Route::get('/vaccination/daily/breakdown-by-district/', [Covid19Controller::class, 'showDailyBreakdownByDistrict'])->name('daily-breakdown-by-district');
Route::get('/vaccination/daily/breakdown-by-district/get-data', [Covid19Controller::class, 'getDailyBreakdownByDistrictData'])->name('get-daily-breakdown-by-district-data');
