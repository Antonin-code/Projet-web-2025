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
        $cohorts = Cohort::all();
        return view('pages.cohorts.index', compact('cohorts' ));
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
    public function update(Request $request, Cohort $cohorts)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Update cohort
        $cohorts->update([
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
        $cohorts = Cohort::all();
        return view('pages.cohorts.index',[
            'cohorts' => $cohorts
        ]);
    }

    //Function to store cohorts
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Cohort::create([
            'school_id' => 1,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect()->route('cohort.index')->with('success', 'Promotion ajoutée avec succès !');
    }

    public function getForm(Cohort $cohort) {
        $dom = view('pages.cohorts.cohort-form', ['cohort' => $cohort])->render();

        return response()->json(['dom' => $dom]);
    }
}
