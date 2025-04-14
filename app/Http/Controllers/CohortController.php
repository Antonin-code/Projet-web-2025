<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * Display all available cohorts
     * @return Factory|View|Application|object
     */
    public function index()
    {
        return view('pages.cohorts.index');
    }


    /**
     * Display a specific cohort
     * @param Cohort $cohort
     * @return Application|Factory|object|View
     */
    public function show(Cohort $cohort)
    {

        return view('pages.cohorts.show', [
            'cohort' => $cohort
        ]);
    }

    //function to update users
    public function update(Request $request, Cohort $cohort)
    {
        $request->validate([
            'school_id' => 'required|int|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Update cohort
        $cohort->update([
            'school_id' => $request->school_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        // Review
        return redirect()->back();
    }

    //Function to delete cohorts
    public function deleteCohorts(Cohort $cohort)
    {
        $cohort->delete();
        return redirect('cohort')->with('La promotion a bien été supprimé');
    }

    //Function to store cohorts
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|string|max:100',
            'name' => 'required|email|max:100',
            'description' => 'required|email|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $user = Cohort:: create([ 'school_id' => $request->school_id, 'name' => $request->name,'description' => $request->description, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        return redirect()->route('cohort.index')->with('Terminé !', 'Promotion crée avec succes');

    }
}
