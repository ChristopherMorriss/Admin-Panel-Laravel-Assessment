<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;

Route::get('/', function () {
    return view('welcome');
    // $test = Companies::all();
    // dd($test);

});


Route::get('/companies', function () {
    $companies = Companies::with('employees')->latest()->paginate(10);
    // $companies=Companies::all();
    // dd($companies);
    // return view('companies', ['companies'=> companies::all()
    // ]);
    return view('companies', ['companies'=> $companies
    ]);
});

Route::post('/companies', function () {
    request()->validate([
        'Name' => ['required', 'min:3'],
        'email' => ['required']
    ]);
    //dd(request('name'));
    Companies::create([
        'Name' => request('name'),
        'email' => request('email'),
        'logo' => 'logo.png',
        'website' => 'website.com'
        
    ]);
    return redirect('/companies');
});

Route::get('/create-company',function() {
    return view ('create-company');
});

Route::get('/companies/{id}',function($id) {
    $company = Companies::find($id);
    return view ('company', ['company'=> $company
    ]);
});

//Edit specific company information
Route::get('/companies/{id}/edit',function($id) {
    $company = Companies::find($id);
    return view ('edit-company', ['company'=> $company
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layouts/app');
});

//Update
Route::patch('/companies/{id}',function($id) {
    request()->validate([
        'Name' => ['required', 'min:3'],
        'email' => ['required']
    ]);
    $company = Companies::find($id);
    // $company->Name = request('Name');
    // $company->email = request('email');
    // $company->save();

    $company->update([
        'Name'=>request('Name'),
        'email'=>request('email'),
    ]);
});

//Delete
Route::delete('/companies/{id}',function($id) {
    $company = Companies::find($id);
    return view ('company', ['company'=> $company
    ]);
});