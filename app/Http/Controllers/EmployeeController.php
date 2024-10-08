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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'company' => ['required'],
            'phone_number' => ['required']
            
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
            'email' => ['required'],
            'company' => ['required'],
            'phone_number' => ['required']
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
        return redirect('/employees/' . $employee->id);
    }
    public function employeeID(Employees $employee){
        //$company = Companies::find($id);
        return view ('employee', ['employee'=> $employee
        ]);
    }
}


