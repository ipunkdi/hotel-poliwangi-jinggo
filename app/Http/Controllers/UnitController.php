<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Inventory;
use App\Models\UnitGroup;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rooms.units.index', ['title' => 'Units', 'inventories' => Inventory::latest()->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.units.create', ['title' => 'Create Unit', 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_person' => 'required|integer',
            'unit_group_id' => 'required|exists:unit_groups,id',
        ]);

        $unit = Unit::create($request->only(['name', 'description', 'max_person']));

        Inventory::create([
            'unit_id' => $unit->id,
            'unit_group_id' => $request->unit_group_id,
        ]);

        return redirect('/room/units')->with('success', 'New Unit has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        $inventory = Inventory::where('unit_id', $id)->firstOrFail();
        return view('rooms.units.show', ['title' => $unit->name, 'inventory' => $inventory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $inventory = Inventory::where('unit_id', $id)->firstOrFail();
        return view('rooms.units.edit', ['title' => $unit->name, 'inventory' => $inventory, 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_person' => 'required|integer',
            'unit_group_id' => 'required|exists:unit_groups,id',
        ]);
    
        $unit = Unit::findOrFail($id);
        $unit->update($request->only(['name', 'description', 'max_person']));
    
        $inventory = Inventory::where('unit_id', $id)->first();
        if ($inventory) {
            $inventory->update([
                'unit_group_id' => $request->unit_group_id,
            ]);
        } else {
            Inventory::create([
                'unit_id' => $id,
                'unit_group_id' => $request->unit_group_id,
            ]);
        }
    
        return redirect('/room/units')->with('success', 'Unit has been updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect('/room/units')->with('success', 'Unit has been deleted!');
    }
}
