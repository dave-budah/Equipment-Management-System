<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $equipments = Equipment::where('user_id', $user->id)->get();
        return view('equipments.index', ['equipments'=>$equipments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','min:3', 'max:1255', 'string'],
            'state' => ['required', 'string'],
            'available' => ['required', 'string'],
            'acquired_at' => 'required',
        ]);
        $data['user_id'] = $request->user()->id;
        $equipment = Equipment::create($data);
        return to_route('equipments.index', $equipment)->with('success', 'Equipment created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        if ($equipment->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('equipments.show', ['equipment' => $equipment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        if ($equipment->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('equipments.edit', ['equipment' => $equipment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        if ($equipment->user_id !== request()->user()->id) {
            abort(403);
        }
         $data = $request->validate([
            'name' => ['required','min:3', 'max:1255', 'string'],
            'state' => ['required', 'string'],
            'available' => ['required', 'string'],
            'acquired_at' => 'required',
        ]);

         $equipment->update($data);
        return to_route('equipments.index', $equipment)->with('success', 'Equipment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
         if ($equipment->user_id !== request()->user()->id) {
            abort(403);
        }
         $equipment->delete();
         return to_route('equipments.index', $equipment)->with('success', 'Deleted updated successfully');
    }
}
