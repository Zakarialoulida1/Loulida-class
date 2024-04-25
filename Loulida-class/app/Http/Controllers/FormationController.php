<?php

// FormationController.php

namespace App\Http\Controllers;

use App\Models\CycleEducative;
use App\Models\Matiere;
use App\Models\Formation;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{

   

    public function index()
    {
        return view('welcome');
    }
    public function allformations()
    {
        $cycle_educatives = CycleEducative::all();
        $matieresByCycle = Matiere::with('cycles')->get()->groupBy(function ($matiere) {
            return $matiere->cycles->pluck('id')->toArray();
        })->toArray();

        return view('formations.index', compact('cycle_educatives', 'matieresByCycle'));
    }
    public function formation()
    {
        $user = User::find(auth()->id());
        $paidFormationIds = $user->payments->where('status', 'validé')->pluck('formation_id')->toArray();

        // Fetch the paid formations along with their associated matieres and cours
        $cycles = Formation::with(['matieres.cours', 'cycleEducative'])->whereIn('id', $paidFormationIds)->get();

        return view('formations.cours', compact('cycles'));
    }

    public function loadMoreData()
    {
        $formations = Formation::with('matieres')->with('cycleEducative')->where('available_place', '>=', 1)->take(3)->get();
        $partners = Partner::with('user')->with('matiere')->where('type', 'teacher')->where('status', 'validé')->take(4)->get();

        return response()->json([
            'formations' => $formations,
            'partners' => $partners,
        ]);
    }

    public function loadAllData()
    {

      
          $formations = Formation::with('matieres')->with('cycleEducative')->where('available_place', '>=', 1)->get();
       
        $partners = Partner::with('user')->with('matiere')->where('type', 'teacher')->where('status', 'validé')->get();
        if(auth()->check() && auth()->user()->role === 'admin'){
            $formations = Formation::with('matieres')->with('cycleEducative')->get();
             }
        return response()->json([
            'formations' => $formations,
            'partners' => $partners,
        ]);
    }



 public function filterFormations(Request $request)
{
   

  
    // Retrieve filtered formations based on selected cycle educative
    $filteredFormations = Formation::query();

    if ($request->cycle_educative_id !== 'all') {
        $filteredFormations->where('cycle_educative_id', $request->cycle_educative_id);

        // Check if user has selected a specific matiere or chose "Select by Cycle Only"
        if ($request->filled('matiere_id') && $request->matiere_id !== 'all') {
            // Filter by matiere if a specific one is selected
            $filteredFormations->whereHas('matieres', function ($query) use ($request) {
                $query->where('id', $request->matiere_id);
            });
        }
    }

    $filteredFormations = $filteredFormations->with('matieres')
        ->with('cycleEducative')
        ->get();

    return response()->json(['formations' => $filteredFormations]);
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
            'name' => 'required|string',
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
            'name'=>$request->name,
        ]);

        // Attach matieres to the formation
        $formation->matieres()->attach($request->matieres);

        return redirect()->route('formation.all')->with('success', 'Formation created successfully!');
    }
    public function getMatieresByCycle($cycleId)
    {
        $matieres = CycleEducative::findOrFail($cycleId)->matieres;
        return response()->json($matieres);
    }



    // FormationsController.php

public function edit($id)
{
    $formation = Formation::findOrFail($id);
    $cycles = CycleEducative::all();
    $matieres = Matiere::all();
    return view('formations.edit', compact('formation','cycles', 'matieres'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the validation rules as needed
        'name'=> 'required|string',
        'cycle_educative_id' => 'required',
        'matieres' => 'required|array',
        'available_place' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
        'duration_months' => 'required|numeric|min:0',
        'description' => 'required|string',
    ]);

    $formation = Formation::findOrFail($id);

    // Update formation properties
    $formation->cycle_educative_id = $request->cycle_educative_id;
    $formation->available_place = $request->available_place;
    $formation->price = $request->price;
    $formation->duration_months = $request->duration_months;
    $formation->description = $request->description;
    $formation->name = $request->name;
    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists

    
        if ($formation->image) {
          
                // Construct the full path to the image file
                $imagePath = public_path('formation/' . $formation->image);
        
                // Check if the file exists before attempting to delete it
                if (file_exists($imagePath)) {
                    // Use unlink() to delete the old image
                    unlink($imagePath);
                }
          
        }
        
        // Store new image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalName();
        $image->move(public_path('formation'), $imageName);
        $formation->image = $imageName;
    }
    // Sync related matieres
    $formation->matieres()->sync($request->matieres);

    // Save the updated formation
    $formation->save();

    return redirect()->route('formation.all')->with('success', 'Formation updated successfully.');
}

// Delete the specified formation from storage.
public function destroy($id)
{
    $formation = Formation::findOrFail($id);

    // Delete the formation's image if it exists
    if ($formation->image) {
           // Construct the full path to the image file
           $imagePath = public_path('formation/' . $formation->image);
        
           // Check if the file exists before attempting to delete it
           if (file_exists($imagePath)) {
               // Use unlink() to delete the old image
               unlink($imagePath);
           }
    }


    
    // Detach any related matieres
    $formation->matieres()->detach();

    // Delete the formation
    $formation->delete();

    return response()->json(['success'=> 'Formation deleted successfully.',]) ;
}


}
