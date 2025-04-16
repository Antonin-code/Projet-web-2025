<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchool;
use App\Models\Cohort;
use App\Models\Groups;

class DashboardController extends Controller
{
    public function index() {
        $user = auth()->user();
        $userRole = auth()->user()->school()->pivot->role;

        //variables
        $studentsNumber = null;
        $teacherNumber = null;
        $cohortsNumber = null;
      //  $groupsNumber = null; //Dont need here du to backlog instructions

        // Check if the user's role is either "admin" or "teacher"
        if (in_array($userRole, ['admin', 'teacher'])) {
            $studentsNumber = UserSchool::where('role', 'student')->count();     // Count the number of students in the "user_school" table
            $teacherNumber = UserSchool::where('role', 'teacher')->count();      // Count the number of teachers in the "user_school" table
            $cohortsNumber = Cohort::count();                                    // Count the total number of cohorts
           // $groupsNumber = Groups::count(); //Dont need here du to backlog instructions
        }

        return view('pages.dashboard.dashboard-' . $userRole, compact(
            'studentsNumber',
            'teacherNumber',
            'cohortsNumber',
          //  'groupsNumber' //Dont need here du to backlog instructions
        ));
    }
}
