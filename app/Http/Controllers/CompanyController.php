<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;

class CompanyController extends Controller
{
    public function index(){
        return view('home');
    }
    public function show(){//Displays the list of companies, with the most recently added company as the first option on the first page
        $companies = Companies::with('employees')->latest()->paginate(10);
        return view('companies', ['companies'=> $companies
        ]);
        
    }
    public function create(){//Returns the view for creating a new company
        if(Auth::guest()){ //Forces users to be logged in before they can try to create a company
            return redirect('/login');
        }
        return view ('create-company');
    }
    public function store(){ //Creates a new company and redirects the user to the companies page
        request()->validate([
            'Name' => ['required', 'min:3'],
            'email' => ['email','nullable'],
            'logo' => ['dimensions:min_width=100,min_height=100','nullable'],
            'website' => ['url','nullable']
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
    public function edit(Companies $company){ //Returns the view for the edit company form
        //$company = Companies::find($id);
        // if(Auth::guest()){
        //     return redirect('/login');
        // }
        return view ('edit-company', ['company'=> $company
        ]);
    }
    public function update(Companies $company){ //Updates the contents of a specific company and redirects to that company's page
        request()->validate([
            'Name' => ['required', 'min:3'],
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
    public function destroy(Companies $company){ //Deletes a specific company and redirects the user to the company page
        //$company = Companies::findOrFail($id)->delete();
        $company->delete();
        return redirect('/companies');
    }
    public function companyID(Companies $company){ //Returns the view containing the information of a specific company
        //$company = Companies::find($id);
        return view ('company', ['company'=> $company
        ]);
    }
}
