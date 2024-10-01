<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Employees;
use App\Models\Companies;

Route::get('/', function () {
    return view('welcome');

});

class Company{
    public static function all(): array{
        return[
            [
                'id' => 1,
                'Name' => 'Johnathan',
            ]

        ];
    }
}
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
    //$company = Companies::find($id);
    $companies = [
        [
            'id' => 1,
            'Name' => 'Johnathan',
            'email' => 'Email@email',
            'website' => 'test.com'
        ]

    ];
    $company = Arr::first($companies, fn($company) => $company['id'] == $id);
    return view ('company', ['company'=> $company
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layouts/app');
});
