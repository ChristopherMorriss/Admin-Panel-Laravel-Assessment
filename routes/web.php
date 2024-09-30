<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;

Route::get('/', function () {
    return view('welcome');

});


Route::get('/companies', function () {
    $companies = Employees::with('company')->paginate(10);
    // $companies=Companies::all();
    // dd($companies);
    // return view('companies', ['companies'=> companies::all()
    // ]);
    return view('companies', ['companies'=> $companies
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layouts/app');
});
