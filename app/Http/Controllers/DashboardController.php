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


        if (in_array($userRole, ['admin', 'teacher'])) {
            $studentsNumber = UserSchool::where('role', 'student')->count();
            $teacherNumber = UserSchool::where('role', 'teacher')->count();
            $cohortsNumber = Cohort::count();
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
