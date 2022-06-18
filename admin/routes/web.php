<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServicesController;


Route::get('/', function () {
    return  view('Home');
});
Route::get('/Visitor',[VisitorController::class,'HomeIndex'])->name('Visitor');
Route::get('/Services',[ServicesController::class,'HomeIndex'])->name('Services');
Route::get('/getservicesdata',[ServicesController::class,'GetServicesData']);