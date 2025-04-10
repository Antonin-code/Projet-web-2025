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

        // On récupère le nombre d'étudiants/d'enseignant/promotions/groupes seulement si on est admin ou teacher
        $nombreEtudiants = null;
        $nombreEnseignants = null;
        $nombrePromotions = null;
        $nombreGroups = null;


        if (in_array($userRole, ['admin', 'teacher'])) {
            $nombreEtudiants = UserSchool::where('role', 'student')->count();
            $nombreEnseignants = UserSchool::where('role', 'teacher')->count();
            $nombrePromotions = Cohort::count();
            $nombreGroups = Groups::count();
        }

        return view('pages.dashboard.dashboard-' . $userRole, compact(
            'nombreEtudiants',
            'nombreEnseignants',
            'nombrePromotions',
            'nombreGroups'
        ));
    }
}
