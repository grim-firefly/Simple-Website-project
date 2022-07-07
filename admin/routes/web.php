<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return  view('Home');
})->name('Home')->middleware('LogInCheck');
Route::get('/Visitor',[VisitorController::class,'HomeIndex'])->name('Visitor')->middleware('LogInCheck');


// admin panel services
Route::get('/Services',[ServicesController::class,'HomeIndex'])->name('Services')->middleware('LogInCheck');
Route::get('/getservicesdata',[ServicesController::class,'GetServicesData'])->middleware('LogInCheck');
Route::post('/deleteservicesdata',[ServicesController::class,'DeleteServicesData'])->middleware('LogInCheck');
Route::post('/singleservicedata',[ServicesController::class , 'SingleServiceData'])->middleware('LogInCheck');
Route::post('/updatesingleservicedata',[ServicesController::class , 'UpdateSingleServiceData'])->middleware('LogInCheck');
Route::post('/addservicedata',[ServicesController::class,'AddServiceData'])->middleware('LogInCheck');


// courses
Route::name('Courses.')->prefix('courses')->group(function(){

    Route::get('',[CoursesController::class,'CourseIndex'])->name('Index')->middleware('LogInCheck');
    Route::get('getdata',[CoursesController::class,'GetCourses'])->name('GetData')->middleware('LogInCheck');
    Route::post('delete',[CoursesController::class,'DeleteCourse'])->name('delete')->middleware('LogInCheck');
    Route::post('insert',[CoursesController::class,'InsertCourse'])->name('Insert')->middleware('LogInCheck');
    Route::post('getcoursedata',[CoursesController::class,'GetCourseData'])->name('GetCourseData')->middleware('LogInCheck');
    Route::post('updatecourse',[CoursesController::class,'UpdateCourse'])->name('Update')->middleware('LogInCheck');
    

});

Route::get('LogIn',[AdminController::class,'LogIn'])->name('LogIn');
Route::post('onLogIn',[AdminController::class,'onLogIn'])->name('OnLogIn');
Route::post('LogOut',[AdminController::class,'onLogOut'])->name('OnLogOut');













