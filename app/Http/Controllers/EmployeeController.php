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
        request()->validate([
            'first_name' => ['required','string','min:3'], //Forcing the input to be a string isn't working...
            'last_name' => ['required','string','min:3'],
            'email' => ['email','nullable'],
            'company' => ['string','nullable'],
            'phone_number' => ['string','nullable']
            //'regex:/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/)'
            //Above regex not working properly for phone_number
        ]);
        Employees::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'companies_id' => fake()->unique()->randomNumber(2,true),
            'company' => request('company'),
            'phone_number' => request('phone_number')
            
        ]);
        return redirect('/employees');
    }
    public function edit(Employees $employee){
        //$company = Companies::find($id);
        // if(Auth::guest()){
        //     return redirect('/login');
        // }
        //dd('Correct');
        return view ('edit-employee', ['employee'=> $employee
        ]);
    }
    public function update(Employees $employee){
        request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['email'],
            'company' => ['string'],
            'phone_number' => ['string']
        ]);
        //$company = Companies::findOrFail($id);
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->company = request('company');
        $employee->phone_number = request('phone_number');
        $employee->save();
    
        // $company->update([
        //     'Name'=>request('Name'),
        //     'email'=>request('email'),
        // ]);
        return redirect('/employees/' . $employee->id);
    }
    public function destroy(Employees $employee){
        //$company = Companies::findOrFail($id)->delete();
        $employee->delete();
        return redirect('/employees');
    }
    public function employeeID(Employees $employee){
        //$company = Companies::find($id);
        return view ('employee', ['employee'=> $employee
        ]);
    }
}


