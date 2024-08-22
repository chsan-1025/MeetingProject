<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Services\MeetingService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;

class MeetingController extends Controller
{
    public function __construct(private MeetingService $meetingService){}

    
    // ----------- Meeting Listing ------------------
    public function index()
    {
        try{
            DB::beginTransaction();
            $response = $this->meetingService->executeMeetingListing();
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
             $response = $this->meetingService->executeCreateMeeting();
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
    // ----------- Store Employee ------------------
    public function store(MeetingRequest $request)
    {
        try {
            DB::beginTransaction();
            $response = $this->meetingService->executeStoreMeeting($request);
            DB::commit();
            return $response;
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure', $ex->getMessage());
        }
    }
 
     // ----------- Edit Employee ------------------
     public function edit($meetingId)
     {
         try {
             DB::beginTransaction();
             $response = $this->meetingService->executeEditMeeting($meetingId);
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
 
     // ----------- Update Employee ------------------
     public function update(MeetingRequest $request, $meetingId)
     {
         try {
             DB::beginTransaction();
             $response = $this->meetingService->executeUpdateMeeting($request, $meetingId);
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }
 
     // ----------- Delete Employee ------------------
     public function destroy($meetingId)
     {
         try {
             DB::beginTransaction();
             $response = $this->meetingService->executeDeleteMeeting($meetingId);
             DB::commit();
             return $response;
         } catch (Exception $ex) {
             DB::rollback();
             return redirect()->back()->with('failure', $ex->getMessage());
         }
     }


     
      // ----------- Get Employees By Department ------------------
      public function getEmployeesByDepartment($departmentId)
      {
          try {
              DB::beginTransaction();
              $response = $this->meetingService->executeGetEmployeesByDepartment($departmentId);
              DB::commit();
              return $response;
          } catch (Exception $ex) {
              DB::rollback();
              return redirect()->back()->with('failure', $ex->getMessage());
          }
      }
}
