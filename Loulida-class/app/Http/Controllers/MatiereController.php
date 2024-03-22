<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\User;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        $data = [
            'Matieres' => Matiere::all(),
            'user' => User::all(),
          
        ];

        return view('Matiere.index', compact( 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Matiere = new Matiere();
        $Matiere->name = $request->input('name');
        $Matiere->save();

        return redirect()->back()->with('success', 'Matiere added successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Matiere = Matiere::find($request->id);


        $Matiere->name = $request->input('name');
        $Matiere->save();

        return redirect()->back()->with('success', 'Matiere updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $Matiere = Matiere::find($id);

      

        $Matiere->delete();

        return to_route('matieres')->with('success', 'Matiere deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $Matiere)
    {
        //
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $Matiere)
    {
        //
    }
}
