<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/authentication', function () {
    return view('authentication');
});

Route::get('/companies', function () {
    return view('companies', ['companies'=> companies::all()
    ]);
});