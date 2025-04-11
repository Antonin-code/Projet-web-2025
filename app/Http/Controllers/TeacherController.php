<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;

class TeacherController extends Controller
{
    //Function to search teacher in bdd
    public function index()
    {
        return view('pages.teachers.index');
    }


}
