<?php

// FormationController.php

namespace App\Http\Controllers;

use App\Models\CycleEducative;
use App\Models\Matiere;
use App\Models\Formation;
use App\Models\Partner;
use Illuminate\Http\Request;

class FormationController extends Controller
{
   
   
   
    public function index()
    {
        $formations = Formation::with('matieres')->get();
        $partners = Partner::where('type', 'teacher')->where('status', 'validé')->get();
   
        return view('welcome', compact('formations', 'partners'));
    }
    
    public function create()
    {
        $cycles = CycleEducative::all();
        $matieres = Matiere::all();
        return view('formations.create', compact('cycles', 'matieres'));
    }

    public function store(Request $request)
    {
      
            $request->validate([
                'cycle_educative_id' => 'required|exists:cycle_educatives,id',
                'matieres' => 'required|array', // Adjust the field name based on your form
                'matieres.*' => 'exists:matieres,id',
                'available_place' => 'required|integer',
                'price' => 'required|numeric',
                'duration_months' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image', // Validate image file
            ]);
            
           // Validate the form data
      
       
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('formation'), $imageName);
        } else {
            $imageName = null;
        }

        // Create the formation
        $formation = Formation::create([
            'cycle_educative_id' => $request->cycle_educative_id,
            'image' => $imageName, // Save image file name
            'available_place' => $request->available_place,
            'price' => $request->price,
            'duration_months' => $request->duration_months,
            'description' => $request->description,
        ]);
   
        // Attach matieres to the formation
        $formation->matieres()->attach(  $request->matieres );
       
        return redirect()->route('formations.create')->with('success', 'Formation created successfully!');
    }
      public function getMatieresByCycle($cycleId)
    {
        $matieres = CycleEducative::findOrFail($cycleId)->matieres;
        return response()->json($matieres);
    }
}

