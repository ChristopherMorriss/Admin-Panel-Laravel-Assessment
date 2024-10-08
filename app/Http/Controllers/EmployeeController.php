<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function show(){
        $employees = Employees::with('companies')->latest()->paginate(10);
        return view('employees', ['employees'=> $employees
        ]);
        
    }
    public function create(){
        if(Auth::guest()){ 
            return redirect('/login');
        }
        return view ('add-employee'); //Changes stop here
    }
    public function store(){
        return view ('edit-company', ['company'=> $company
        ]);
        request()->validate([
            'Name' => ['required', 'min:3'],
            'email' => ['required']
        ]);
        //dd(request('name'));
        Companies::create([
            'Name' => request('Name'),
            'email' => request('email'),
            'logo' => 'logo.png',
            'website' => 'website.com'
            
        ]);
        return redirect('/companies');
    }
    public function edit(Companies $company){
        //$company = Companies::find($id);
        // if(Auth::guest()){
        //     return redirect('/login');
        // }
        return view ('edit-company', ['company'=> $company
        ]);
    }
    public function update(Companies $company){
        request()->validate([
            'Name' => ['required', 'min:3'],
            'email' => ['required']
        ]);
        //$company = Companies::findOrFail($id);
        $company->Name = request('Name');
        $company->email = request('email');
        $company->save();
    
        // $company->update([
        //     'Name'=>request('Name'),
        //     'email'=>request('email'),
        // ]);
        return redirect('/companies/' . $company->id);
    }
    public function destroy(Companies $company){
        //$company = Companies::findOrFail($id)->delete();
        $company->delete();
        return redirect('/companies/' . $company->id);
    }
    public function companyID(Companies $company){
        //$company = Companies::find($id);
        return view ('company', ['company'=> $company
        ]);
    }
}

