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

    public function showTeachers()
    {
        $teachers = UserSchool::where('role', 'teacher')->get();

        return view('pages.teachers.index', compact('teachers'));
    }

    //function to delete teachers
    public function deleteTeacher(User $teachers)
    {
        $teachers->delete();
        return redirect('students')->with('Le professeur a bien été supprimé');
    }

    //function to update users
    public function update(Request $request, User $user)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
        ]);

        // Update user
        $user->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
        ]);

        // Review
        return redirect()->back();
    }
}
