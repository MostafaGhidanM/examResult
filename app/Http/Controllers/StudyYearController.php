<?php

namespace App\Http\Controllers;

use App\Models\StudyYear;
use Illuminate\Http\Request;

class StudyYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyyears = StudyYear::latest()->paginate(5);

        return view('studyyears.index',compact('studyyears'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('studyyears.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'yearName' => 'required',
        ]);

        StudyYear::create($request->all());

        return redirect()->route('studyyear.index')
                        ->with('success',' StudyYear created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(StudyYear $studyyear)
    {

        return view('studyyears.show', compact('studyyear'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyYear $studyyear)
    {
        return view('studyyears.edit',compact('studyyear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyYear $studyyear)
    {
        $request->validate([
            'yearName' => 'required',
        ]);

        $studyyear->update($request->all());

        return redirect()->route('studyyear.index')
                        ->with('success','studyYear updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyYear $studyyear)
    {
        $studyyear->delete();

        return redirect()->route('studyyear.index')
                        ->with('success','studyYear deleted successfully');

    }
}