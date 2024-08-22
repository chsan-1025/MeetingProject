<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\EmployeeController;

// Route::get('/', function () {
//     return redirect('login');
// });

Route::get('/', [AdminController::class, 'calenderView'])->name('calender.view');
Route::get('/logout', [AdminController::class, 'logout'])->name('user.logout');

Route::get('/emplyee-dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('employee.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth' , 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'adminDashboard')->name('dashboard');
    });
    // Employee Routes:
    Route::resource('employees', EmployeeController::class);
    Route::get('employees/destroy/{employeeId}', [EmployeeController::class,'destroy']);

    // Meeting Routes:
    Route::resource('meetings', MeetingController::class);
    Route::get('meetings/destroy/{employeeId}', [MeetingController::class,'destroy']);
    Route::get('departments/{departmentId}/employees', [MeetingController::class, 'getEmployeesByDepartment']);
});

require __DIR__.'/auth.php';
