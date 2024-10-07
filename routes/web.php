<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;
use App\Http\Controllers\CompanyController;
//Index
Route::get('/', function () {
    return view('welcome');
});

Route::controller(CompanyController::class)->group(function(){
    Route::get('/companies','show');
    Route::post('/companies','store');
    Route::get('/create-company','create');
    Route::get('/companies/{company}','companyID');
    Route::get('/companies/{company}/edit','edit')->middleware('auth')->can('edit','companies');
    Route::patch('/companies/{company}','update');
    Route::delete('/companies/{company}','destroy');
    //->middleware('auth');
});

//Route::resource('companies', CompanyController::class)->middleware(auth);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layouts/app');
});

