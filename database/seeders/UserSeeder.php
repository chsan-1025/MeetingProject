<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Employee;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Str;
use App\Enums\DepartmentEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\MeetingParticipantEmployee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::find(1);
        $employeeRole = Role::find(2);

        // For Admin User
        $adminUser = new User();
        $adminUser->name = "Admin";
        $adminUser->email = "admin@admin.com";
        $adminUser->email_verified_at = now();
        $adminUser->password = bcrypt('12345678');
        $adminUser->remember_token = Str::random(10);
        $adminUser->type = UserTypeEnum::Admin;
        $adminUser->created_by = 1;
        $adminUser->save();
        $adminUser->assignRole($adminRole);

        // For Employee User
        $employeeUser1 = new User();
        $employeeUser1->name = "Employee One";
        $employeeUser1->email = "employee1@gmail.com";
        $employeeUser1->email_verified_at = now();
        $employeeUser1->password = bcrypt('12345678');
        $employeeUser1->remember_token = Str::random(10);
        $employeeUser1->type = UserTypeEnum::Employee;
        $employeeUser1->created_by = 1;
        $employeeUser1->save();
        $employeeUser1->assignRole($employeeRole);

        $employee1 = new Employee();
        $employee1->user_id = $employeeUser1->id;
        $employee1->department = DepartmentEnum::FrontEndDeveloper;
        $employee1->save();

        // Add second employee
        $employeeUser2 = new User();
        $employeeUser2->name = "Employee Two";
        $employeeUser2->email = "employee2@gmail.com";
        $employeeUser2->email_verified_at = now();
        $employeeUser2->password = bcrypt('12345678');
        $employeeUser2->remember_token = Str::random(10);
        $employeeUser2->type = UserTypeEnum::Employee;
        $employeeUser2->created_by = 1;
        $employeeUser2->save();
        $employeeUser2->assignRole($employeeRole);

        $employee2 = new Employee();
        $employee2->user_id = $employeeUser2->id;
        $employee2->department = DepartmentEnum::FrontEndDeveloper;
        $employee2->save();

        // Create some meetings
        $meeting1 = new Meeting();
        $meeting1->title = "Project Kickoff";
        $meeting1->start_time = now()->addDays(1)->toDateTimeString();
        $meeting1->end_time = now()->addDays(1)->addHours(2)->toDateTimeString();
        $meeting1->created_by = $adminUser->id;
        $meeting1->organizer = $adminUser->name;
        $meeting1->department = DepartmentEnum::FrontEndDeveloper;
        $meeting1->save();

        $meeting2 = new Meeting();
        $meeting2->title = "Sprint Planning";
        $meeting2->start_time = now()->addDays(3)->toDateTimeString();
        $meeting2->end_time = now()->addDays(3)->addHours(1)->toDateTimeString();
        $meeting2->created_by = $adminUser->id;
        $meeting2->organizer = $adminUser->name;
        $meeting2->department = DepartmentEnum::FrontEndDeveloper;
        $meeting2->save();

        // Add participants to meetings
        MeetingParticipantEmployee::create([
            'meeting_id' => $meeting1->id,
            'user_id' => $employee1->user_id,
        ]);

        MeetingParticipantEmployee::create([
            'meeting_id' => $meeting1->id,
            'user_id' => $employee2->user_id,
        ]);

        MeetingParticipantEmployee::create([
            'meeting_id' => $meeting2->id,
            'user_id' => $employee1->user_id,
        ]);

    }
}
