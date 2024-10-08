<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\User;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
//Index
Route::get('/', function () {
    return view('welcome');
});

Route::controller(CompanyController::class)->group(function(){
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

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employees','show');
    Route::post('/employeees','store');
    Route::get('/add-employee','create');
    Route::get('/employees/{employee}','employeeID');
    Route::get('/employees/{employee}/edit','edit');
    Route::patch('/employees/{employee}','update');
    Route::delete('/employees/{employee}','destroy');
});
//Route::resource('companies', CompanyController::class)->middleware(auth);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layouts/app');
    //dd(Auth::user()->admin );
    
});

