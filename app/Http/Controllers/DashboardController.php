<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\School;

class DashboardController extends Controller
{
    public function index() {
        $userRole = auth()->user()->school()->pivot->role;
        $teacherCount = teacher::all()->count();
        $studentCount = Student::all()->count();
        return view('pages.dashboard.dashboard-' . $userRole , ['teacherCount' => $teacherCount], ['studentCount' => $studentCount]);
    }





}
