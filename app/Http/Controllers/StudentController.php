<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $count = User::count();
        return view('pages.students.index',['student'=> $count]  );

    }
}
