<?php

namespace App\Services;

use App\Models\Meeting;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class AdminService
{

    // =============== Admin Dashboard ==================
    public function executeAdminDashboard(){
        $totalMeetings = Meeting::count();
        $totalEmployees = Employee::count();
        return view('admin.dashboard', compact('totalMeetings', 'totalEmployees'));
    }


    // =============== Admin Dashboard ==================
    public function executeLogout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Successfully loggedOut!');
    }


    
    // =============== Calender View  ==================
    public function executeCalenderView(){
        $meetings = Meeting::with('participants.user')->get()->map(function($meeting) {
            // Fetch participant names
            $participantNames = $meeting->participants->map(function($participant) {
                return $participant->user->name;
            })->join(', ');
    
            return [
                'title' => $meeting->title,
                'start' => $meeting->start_time->toIso8601String(),
                'end' => $meeting->end_time->toIso8601String(),
                'organizer' => $meeting->organizer,
                'participants' => $participantNames, // Add participant names
            ];
        });
    
        return view('welcome', compact('meetings'));

    }
   
}