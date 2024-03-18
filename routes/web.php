<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource("/student", StudentController::class);
Route::resource("/weather", WeatherController::class);
Route::get('/qrcode',[QrCodeController::class, 'index']);

Route::get('/students/{student}', 'StudentController@show')->name('students.show');  //route model binding



