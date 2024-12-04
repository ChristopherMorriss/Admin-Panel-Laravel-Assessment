<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\User;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
//Index
Route::get('/', function () { //The root page
    return view('home'); //auth/login
});

Route::controller(CompanyController::class)->group(function(){ //Controller used for handling all company related pages
    Route::get('/companies','show');
    Route::post('/companies','store');
    Route::get('/create-company','create');
    Route::get('/companies/{company}','companyID');
    Route::get('/companies/{company}/edit','edit');
    //->middleware('auth')->can('edit','companies');
    Route::patch('/companies/{company}','update');
    Route::delete('/companies/{company}','destroy');
    //->middleware('auth');
});

Route::controller(EmployeeController::class)->group(function(){ //Controller used for handling all employee related pages
    Route::get('/employees','show');
    Route::post('/employees','store');
    Route::get('/add-employee','create');
    Route::get('/employees/{employee}','employeeID');
    Route::get('/employees/{employee}/edit','edit');
    Route::patch('/employees/{employee}','update');
    Route::delete('/employees/{employee}','destroy');
});
//Route::resource('companies', CompanyController::class)->middleware(auth);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
//The home page (not to be confused with the root page) which the user is redirected to when they login

Route::get('/app', function () {
    return view('layouts/app');
});

