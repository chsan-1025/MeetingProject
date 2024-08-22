<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Services\AdminService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function __construct(private AdminService $adminService){}

    
    // ----------- Admin Dashboard ------------------
    public function adminDashboard()
    {
        try{
            DB::beginTransaction();
            $response = $this->adminService->executeAdminDashboard();
            DB::commit();
            return $response;
        }catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure',$ex->getMessage());
        }
    }


    // ----------- Logout ------------------
    public function logout()
    {
        try{
            DB::beginTransaction();
            $response = $this->adminService->executeLogout();
            DB::commit();
            return $response;
        }catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure',$ex->getMessage());
        }
    }

    
    public function calenderView()
    {
        try{
            DB::beginTransaction();
            $response = $this->adminService->executeCalenderView();
            DB::commit();
            return $response;
        }catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure',$ex->getMessage());
        }
    }
}
