<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;

class TeacherController extends Controller
{
    //Function to search teachers in bdd
    public function index()
    {
        $count = User::count();
        $teachers = UserSchool::where('role', 'teacher')->get();
        return view('pages.teachers.index', compact('teachers' ));

    }

    //Function so store teachers
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'birth_date' => 'required|date',
        ]);
        $user = User:: create(['last_name' => $request->last_name, 'first_name' => $request->first_name, 'email' => $request->email, 'birth_date' => $request->birth_date, 'password' => $request->email]);
        UserSchool:: create(['user_id' => $user->id, 'school_id' => 1, 'role' => 'teacher']);
        return redirect()->route('teacher.index')->with('Terminé !', 'Utilisateur créé avec succès');

    }

    //function to delete teachers
    public function deleteTeachers(User $teacher)
    {
        $teacher->delete();
        return redirect('teachers')->with('Le professeur a bien été supprimé');
    }

    //function to update users
    public function updateTeacher(Request $request, User $teachers)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
        ]);

        // Update user
        $teachers->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
        ]);

        // Review
        return redirect()->back();
    }
}
