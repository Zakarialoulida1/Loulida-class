<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\CycleEducative;
use App\Models\Matiere;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index ()
{
    
 // Récupérer tous les cycles éducatifs avec leurs matières et cours associés, où au moins un cours contient des cours_files
// Récupérer tous les cycles éducatifs avec leurs matières et cours associés, mais seulement pour un cycle éducatif spécifique


// $cycles = CycleEducative::all();

// // Loop through each cycle éducatif
// foreach ($cycles as $cycle) {
//     // Récupérer les matières associées à ce cycle éducatif
//     $matieres = $cycle->matieres;

//     // Loop through each matière
//     foreach ($matieres as $matiere) {
//         // Récupérer les cours uniquement pour ce cycle éducatif et cette matière
//         $cours = Cours::where('cycle_educative_id', $cycle->id)
//                       ->where('matiere_id', $matiere->id)
//                       ->with('coursFiles')
//                       ->get();

//                     echo $cours;
                   
//     }
// }


// Récupérer tous les cycles éducatifs avec leurs matières et cours associés, où au moins un cours contient des cours_files

    $cycles = CycleEducative::with('matieres.cours.coursFiles')->get();

 


    return view('Cours.index', compact('cycles'));
}

   

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cycle_educatives = CycleEducative::all();
        $matieresByCycle = Matiere::with('cycles')->get()->groupBy(function($matiere) {
            return $matiere->cycles->pluck('id')->toArray();
        })->toArray();
        

        return view('Cours.add_course', compact('cycle_educatives', 'matieresByCycle'));
    }

    /**
     * Store a newly created resource in storage.
     */
   
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'cycle_educative_id' => 'required|exists:cycle_educatives,id',
        'matiere_id' => 'required|exists:matieres,id',
        'course_files.*' => 'nullable|file|mimes:pdf', // Validate each uploaded course file
        'exercise_files.*' => 'nullable|file|mimes:pdf', // Validate each uploaded exercise file
  ]);



    // Store course data
    $course = new Cours();
    $course->title = $request->title;
    $course->description = $request->description;
    $course->cycle_educative_id = $request->cycle_educative_id;
    $course->matiere_id = $request->matiere_id;
    $course->user_id = auth()->id();
    $course->save();

    // Store course files
    
    $this->storeFiles($request, $course, 'course_files');
    $this->storeFiles($request, $course, 'exercise_files');

    return redirect()->back()->with('success', 'Course created successfully.');
}


private function storeFiles($request, $course, $fileInputName)
{
    if ($request->hasFile($fileInputName)) {
        foreach ($request->file($fileInputName) as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName(); // Using original file name for uniqueness
            $filePath = $file->storeAs('public/' . $fileInputName, $fileName); // Store file in storage/app/public/course_files or storage/app/public/exercise_files
            // Save file details to database
            if ($fileInputName === 'course_files') {
                $course->coursFiles()->create(['name' => $fileName, 'path' => $filePath, 'user_id' => auth()->id()]);
            } elseif ($fileInputName === 'exercise_files') {
                $course->exerciseFiles()->create(['name' => $fileName, 'path' => $filePath ,'user_id' => auth()->id()]);
            }
        }
    }
}



    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add validation rules for other fields as needed
        ]);

        // Find the course by its ID
        $course = Cours::findOrFail($id);

        // Update the course with the new data
        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            // Update other fields as needed
        ]);

        // Optionally, you can return a response indicating success or redirect the user
        return redirect()->back()->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $course)
    {
      



        try {
            // Authorize the delete action
            $this->authorize('delete', $course);
    
            // Delete the cours file
            $course->delete();
            
            return redirect()->back()->with('success', 'Cours file deleted successfully.');
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'You are not authorized to delete this file.');
        }
    
    }
}
