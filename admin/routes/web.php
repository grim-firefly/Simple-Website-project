<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CoursesController;


Route::get('/', function () {
    return  view('Home');
});
Route::get('/Visitor',[VisitorController::class,'HomeIndex'])->name('Visitor');


// admin panel services
Route::get('/Services',[ServicesController::class,'HomeIndex'])->name('Services');
Route::get('/getservicesdata',[ServicesController::class,'GetServicesData']);
Route::post('/deleteservicesdata',[ServicesController::class,'DeleteServicesData']);
Route::post('/singleservicedata',[ServicesController::class , 'SingleServiceData']);
Route::post('/updatesingleservicedata',[ServicesController::class , 'UpdateSingleServiceData']);
Route::post('/addservicedata',[ServicesController::class,'AddServiceData']);


// courses
Route::name('Courses.')->prefix('courses')->group(function(){

    Route::get('',[CoursesController::class,'CourseIndex'])->name('Index');

});



