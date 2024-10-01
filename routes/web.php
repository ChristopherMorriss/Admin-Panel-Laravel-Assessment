<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;

Route::get('/', function () {
    //return view('welcome');
    $test = Companies::all();
    dd($test);

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

Route::get('/companies/{id}',function($id) {
    $company = Companies::all();
    return view ('company', ['company'=> $company
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layouts/app');
});
