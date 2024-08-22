<?php

namespace App\Services;

use App\Models\User;
use App\Models\Employee;
use App\Enums\UserTypeEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{

    // =============== Employee Listing ==================
    public function executeEmployeeListing(){
        $employees = Employee::get();
        return view('admin.employee.index' , compact('employees'));
    }

    // =============== Create Employee ==================
    public function executeCreateEmployee(){
        return view('admin.employee.create');
    }
    // =============== Store Employee ==================
    public function executeStoreEmployee($request){
        $employeeRole = Role::findOrFail(2);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'type' => UserTypeEnum::Employee,
            'created_by' => Auth::user()->id,
        ]);

        $user->assignRole($employeeRole);
        
        Employee::create([
            'user_id' => $user->id,
            'department' => $request->department,
        ]);
        return redirect()->route('admin.employees.index')->with('success' , __('Employee Created Successfully.'));
    }

    // =============== Edit Employee ==================
    public function executeEditEmployee($employeeId){
        $employee = Employee::with('user')->findOrFail($employeeId);
        return view('admin.employee.edit' , compact('employee'));
    }


    // =============== Update Employee ==================
    public function executeUpdateEmployee($request , $employeeId){
        $employee = Employee::findOrFail($employeeId);
        $employee->update([
            'department' => $request->department,
        ]);

        $employee->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.employees.index')->with('success' , __('Employee Updated Successfully.'));
    }

     // =============== Delete Employee ==================
     public function executeDeleteEmployee($employeeId){
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success' , __('Employee Deleted Successfully.'));
    }

}