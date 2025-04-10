<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use function Laravel\Prompts\password;

class StudentController extends Controller
{
    public function index()
    {
        $count = User::count();
        $students = UserSchool::where('role', 'student')->get();
        return view('pages.students.index', compact('students', ));

    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'birth_date' => 'required|date',
        ]);
        $user = User:: create(['last_name' => $request->last_name, 'first_name' => $request->first_name, 'email' => $request->email, 'birth_date' => $request->birth_date, 'password' => $request->email]);
        UserSchool:: create(['user_id' => $user->id, 'school_id' => 1, 'role' => 'student']);
        return redirect()->route('student.index')->with('Terminé !', 'Utilisateur créé avec succès');

    }

    //function to showStudents
    public function showStudents()
    {
        $students = UserSchool::where('role', 'student')->get();

        return view('pages.students.index', compact('students'));
    }

    //function to delete students
    public function deleteStudents(User $student)
    {
        $student->delete();
        return redirect('students')->with('L etudiant a bien été supprimé');
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
