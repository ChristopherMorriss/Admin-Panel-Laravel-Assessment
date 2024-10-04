<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompanyController extends Controller
{
    public function index(){
        // dd('Hello');
        $companies = Companies::with('employees')->latest()->paginate(10);
        return view('companies', ['companies'=> $companies
        ]);
    }
    public function show(){
        $companies = Companies::with('employees')->latest()->paginate(10);
        return view('companies', ['companies'=> $companies
        ]);
        
    }
    public function create(){
        return view ('create-company');
    }
    public function store(){
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
    public function edit(){
        $company = Companies::find($id);
        return view ('edit-company', ['company'=> $company
        ]);
    }
    public function update(){
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
    }
    public function delete(){
        $company = Companies::findOrFail($id)->delete();
        return redirect('/companies/' . $company->id); //Works but generates this error: Attempt to read property on bool
        //Deleted jobs remain until the page
    }
}
