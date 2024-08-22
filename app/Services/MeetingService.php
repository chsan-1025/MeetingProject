<?php

namespace App\Services;

use App\Models\Meeting;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\MeetingParticipantEmployee;

class MeetingService
{
     // =============== Meeting Listing ==================
     public function executeMeetingListing(){
        $meetings = Meeting::get();
        return view('admin.meeting.index' , compact('meetings'));
    }

    // =============== Create Meeting ==================
    public function executeCreateMeeting(){
        return view('admin.meeting.create');
    }
    // =============== Store Meeting ==================
    public function executeStoreMeeting($request){
        $conflict = Meeting::where('start_time', '<', $request->end_time)
        ->where('end_time', '>', $request->start_time)
        ->exists();

        if ($conflict) {
        return redirect()->back()->with(['failure' , 'This time slot is already booked.']);
        }
        $meeting = Meeting::create([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' =>$request->end_time,
            'created_by' => Auth::user()->id,
            'organizer'=> Auth::user()->name,
            'department' => $request->department,
        ]);

        foreach ($request->participants as $participantId) {
            MeetingParticipantEmployee::create([
                'meeting_id' => $meeting->id,
                'user_id' => $participantId,
            ]);
        }
        return redirect()->route('admin.meetings.index')->with('success' , __('Meeting Created Successfully.'));
    }

    // =============== Edit Meeting ==================
    public function executeEditMeeting($meetingId){
        $meeting = Meeting::with('participants')->findOrFail($meetingId);
        $selectedParticipants = $meeting->participants->pluck('user_id')->toArray();
        return view('admin.meeting.edit' , compact('meeting' , 'selectedParticipants'));
    }


    // =============== Update Meeting ==================
    public function executeUpdateMeeting($request , $meetingId){
        // Check for conflicting meeting times, excluding the current meeting
        $conflict = Meeting::where('id', '!=', $meetingId)
        ->where('start_time', '<', $request->end_time)
        ->where('end_time', '>', $request->start_time)
        ->exists();

        if ($conflict) {
            return redirect()->back()->with('failure', 'This time slot is already booked.');
        }

        // Update the meeting details
        $meeting = Meeting::findOrFail($meetingId);
        $meeting->update([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'created_by' => Auth::user()->id,
            'organizer' => Auth::user()->name,
            'department' => $request->department,
        ]);

        MeetingParticipantEmployee::where('meeting_id', $meetingId)->delete();

        // Then, add the new participants
        foreach ($request->participants as $participantId) {
            MeetingParticipantEmployee::create([
                'meeting_id' => $meeting->id,
                'user_id' => $participantId,
            ]);
        }
        return redirect()->route('admin.meetings.index')->with('success' , __('Meeting Updated Successfully.'));
    }

    // =============== Delete Meeting ==================
    public function executeDeleteMeeting($meetingId){
        $meeting = Meeting::findOrFail($meetingId);
        MeetingParticipantEmployee::where('meeting_id', $meetingId)->delete();
        // Delete the meeting
        $meeting->delete();
        return redirect()->route('admin.meetings.index')->with('success' , __('Meeting Deleted Successfully.'));
    }

    
     // =============== Get Employees By Department ==================
    public function executeGetEmployeesByDepartment($departmentId){
        $employees = Employee::with(['user:id,name'])
        ->where('department', $departmentId)
        ->get()
        ->map(function ($employee) {
            return [
                'id' => $employee->user->id,
                'name' => $employee->user->name,
            ];
        });
        return response()->json($employees);
    }

}   