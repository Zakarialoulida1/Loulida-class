<?php

namespace App\Http\Controllers;

use App\Models\CycleEducative;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Http\Request;

class CycleEducativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'CyclesEducatives' => CycleEducative::with('matieres')->get(),
            'user' => User::all(),
            'matieres' => Matiere::all(),
        ];

        return view('cycle.index', compact('data'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'matiere_ids.*' => 'exists:matieres,id',
        ]);


        try {
            // Create the cycle
            $cycle = CycleEducative::create([
                'name' => $request->input('name'),
            ]);

            // Attach the selected matières to the cycle
            $cycle->matieres()->attach($request->input('matiere_ids'));

            return redirect()->route('cycles.index')->with('success', 'Cycle created successfully');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->with('error', 'Failed to create cycle. Please try again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        
        $request->validate([
            'id' => 'required|exists:cycle_educatives,id',
            'name' => 'required|string|max:255',
            'matiere_ids.*' => 'exists:matieres,id',
        ]);
       
        try {
            $cycle = CycleEducative::find($request->id);
            $cycle->name = $request->input('name');
            $cycle->save();
    
            // Sync the associated matieres
            $cycle->matieres()->sync($request->input('matiere_ids'));
    
            return redirect()->back()->with('success', 'Cycle updated successfully');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->with('error', 'Failed to update cycle. Please try again.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $cycle = CycleEducative::find($id);



        $cycle->delete();

        return to_route('cycles')->with('success', 'cycle deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CycleEducative $cycleEducative)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CycleEducative $cycleEducative)
    {
        //
    }
}
