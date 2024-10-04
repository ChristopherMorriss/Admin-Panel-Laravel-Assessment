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

Route::get('/companies', [CompanyController::class,'show']);
Route::post('/companies', [CompanyController::class,'store']);
Route::get('/create-company',[CompanyController::class,'create']);


//Store
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
    $company = Companies::findOrFail($id);
    $company->Name = request('Name');
    $company->email = request('email');
    $company->save();

    // $company->update([
    //     'Name'=>request('Name'),
    //     'email'=>request('email'),
    // ]);
    return redirect('/companies/' . $company->id);
});

//Delete
Route::delete('/companies/{id}',function($id) {
    $company = Companies::findOrFail($id)->delete();
    return redirect('/companies/' . $company->id); //Works but generates this error: Attempt to read property on bool
    //Deleted jobs remain until the page
});