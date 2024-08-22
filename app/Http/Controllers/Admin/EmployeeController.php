<?php

namespace App\Http\Controllers\Admin;


use Exception;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeService $employeeService){}

    
    // -----------  Employee Listing ------------------
    public function index()
    {
        try{
            DB::beginTransaction();
            $response = $this->employeeService->executeEmployeeListing();
            DB::commit();
            return $response;
        }catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure',$ex->getMessage());
        }
    }
    
    // ----------- Create Employee ------------------
     public function create()
     {
         try {
             DB::beginTransaction();
             $response = $this->employeeService->executeCreateEmployee();
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
    // ----------- Create Employee ------------------
    public function store(EmployeeRequest $request)
    {
        try {
            DB::beginTransaction();
            $response = $this->employeeService->executeStoreEmployee($request);
            DB::commit();
            return $response;
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure', $ex->getMessage());
        }
    }
 
     // ----------- Edit Employee ------------------
     public function edit($employeeId)
     {
         try {
             DB::beginTransaction();
             $response = $this->employeeService->executeEditEmployee($employeeId);
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
 
     // ----------- Update Employee ------------------
     public function update(EmployeeRequest $request, $employeeId)
     {
         try {
             DB::beginTransaction();
             $response = $this->employeeService->executeUpdateEmployee($request, $employeeId);
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
 
     // ----------- Delete Employee ------------------
     public function destroy($employeeId)
     {
         try {
             DB::beginTransaction();
             $response = $this->employeeService->executeDeleteEmployee($employeeId);
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
}
