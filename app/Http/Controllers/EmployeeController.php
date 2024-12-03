<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function show(){ //Displays the list of employees, with the most recently added employee as the first option on the first page
        $employees = Employees::with('companies')->latest()->paginate(10);
        return view('employees', ['employees'=> $employees
        ]);
        
    }
    public function create(){ //Returns the view for adding a new employee
        if(Auth::guest()){ //Forces users to be logged in before they can try to add an employee 
            return redirect('/login');
        }
        return view ('add-employee'); 
    }
    public function store(){ //Creates a new employee and redirects the user to the employees page
        request()->validate([
            'first_name' => ['required','string','min:3'], 
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
    public function edit(Employees $employee){//Returns the view for the edit employee form
        //$company = Companies::find($id);
        // if(Auth::guest()){
        //     return redirect('/login');
        // }
        //dd('Correct');
        return view ('edit-employee', ['employee'=> $employee
        ]);
    }
    public function update(Employees $employee){ //Updates the contents of a specific employee and redirects to that employee's page
        request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['email','nullable'],
            'company' => ['string','nullable'],
            'phone_number' => ['string','nullable']
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
    public function destroy(Employees $employee){//Deletes a specific employee and redirects the user to the employee page
        //$company = Companies::findOrFail($id)->delete();
        $employee->delete();
        return redirect('/employees');
    }
    public function employeeID(Employees $employee){//Returns the view containing the information of a specific employee
        //$company = Companies::find($id);
        return view ('employee', ['employee'=> $employee
        ]);
    }
}


