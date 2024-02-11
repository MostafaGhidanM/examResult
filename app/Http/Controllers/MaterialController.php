<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Grade;
use App\Models\StudyYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $materials = Material::latest()->paginate(5);

        return view('materials.index',compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5); */
        
        $materials = DB::select("SELECT `materials`.`id`, `materials`.`materialName`, `studyyears`.`yearName`, `grades`.`gradeName` FROM `materials`, `studyyears`, `grades` WHERE `materials`.`studyYearId` = `studyyears`.`id` AND `grades`.`id` = `materials`.`gradeId`;");

        return view('materials.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyyears = StudyYear::all();
        $grades = Grade::all();
        return view('materials.create', compact('studyyears', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'materialName' => 'required',
            'studyYearId' => 'required',
            'gradeId' => 'required',
        ]);

        Material::create($request->all());

        return redirect()->route('material.index')
                        ->with('success',' materials created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $studyyears = StudyYear::all();
        $grades = Grade::all();
        return view('materials.edit',compact('material', 'studyyears', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'materialName' => 'required',
        ]);

        $material->update($request->all());

        return redirect()->route('material.index')
                        ->with('success','material updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
        $material->delete();

        return redirect()->route('material.index')
                        ->with('success','materials deleted successfully');
    }
}