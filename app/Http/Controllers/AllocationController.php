<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $user = $request->user();
        $allocations = Allocation::where('user_id', $user->id)->get();
        return view('allocations.index', ['allocations' => $allocations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Allocation $allocation, User $user, Equipment $equipment)
    {
        $users = User::query()->where('role', '!=', 'superadmin')->get();
        $equipments = Equipment::query()->where('available', 'yes')->get();
        return view('allocations.create', ['users' => $users, 'equipments' => $equipments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item'=> ['required'],
            'allocated_to'=> ['required'],
            'allocated_at'=> ['required'],
            'returned_at' => ['nullable'],
            'state' => ['nullable'],
        ]);
        $data['user_id'] = $request->user()->id;
        $allocation = Allocation::create($data);
        return to_route('allocations.index', $allocation)->with('success', 'Allocation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Allocation $allocation)
    {
        if ($allocation->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('allocationS.show', ['allocation' => $allocation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Allocation $allocation)
    {

         return view('allocations.create', [ 'allocation' => $allocation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Allocation $allocation)
    {
         if ($allocation->user_id !== request()->user()->id) {
            abort(403);
        }
         $data = $request->validate([
             'item'=> ['required'],
            'allocated_to'=> ['required'],
            'allocated_at'=> ['required'],
            'returned_at' => ['nullable'],
            'state' => ['nullable'],
        ]);

         $allocation->update($data);
        return to_route('allocations.index', $allocation)->with('success', 'Allocation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allocation $allocation)
    {
        if ($allocation->user_id !== request()->user()->id) {
            abort(403);
        }
         $allocation->delete();
         return to_route('allocations.index', $allocation)->with('success', 'Allocation updated successfully');
    }
}
