<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;

class CompanyController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function show(){
        $companies = Companies::with('employees')->latest()->paginate(10);
        return view('companies', ['companies'=> $companies
        ]);
        
    }
    public function create(){
        if(Auth::guest()){ //Forces guests to be logged in before they can try to create a company
            return redirect('/login');
        }
        return view ('create-company');
    }
    public function store(){
        request()->validate([
            'Name' => ['required', 'min:3'],
            'email' => ['required'],
            'logo' => ['dimensions:min_width=100,min_height=100']
        ]);
        //dd(request('name'));
        Companies::create([ //Takes the information from the input fields of Name, email, logo, website and stores them in the database
            'Name' => request('Name'),
            'email' => request('email'),
            'logo' => request('logo'),
            'website' => request('website')
            
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
        return redirect('/companies');
    }
    public function companyID(Companies $company){
        //$company = Companies::find($id);
        return view ('company', ['company'=> $company
        ]);
    }
}
