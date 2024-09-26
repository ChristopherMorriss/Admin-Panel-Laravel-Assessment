<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/companies', function () {
    return view('companies', ['companies'=> companies::all()
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
