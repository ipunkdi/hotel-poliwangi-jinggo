<?php

namespace App\Http\Controllers;

use App\Models\UnitGroup;
use Illuminate\Http\Request;

class UnitGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rooms.unit-groups.index', ['title' => 'Unit Groups', 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.unit-groups.create', ['title' => 'Create Unit Group']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required'
        ]);

        UnitGroup::create($validatedData);

        return redirect('/room/unit-groups')->with('success', 'New unit group has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitGroup $unitGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitGroup $unitGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitGroup $unitGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitGroup $unitGroup)
    {
        UnitGroup::destroy($unitGroup->id);
        
        return redirect('/room/unit-groups')->with('success', 'Unit group has been deleted!');
    }
}
