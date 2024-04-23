<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\ExerciseFile;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;


class ExerciseFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       
        // Validate the uploaded files
        $request->validate([
            'exercise_files_without_correction.*' => 'required|file|mimes:pdf,doc,docx|max:10240', // Example validation rules
        ]);

        // Get the course ID from the form
        $courseId = $request->input('course_id');

        // Store the uploaded files
        $course = Cours::findOrFail($courseId);
        $this->storeFiles($request, $course, 'exercise_files_without_correction');

        // Optionally, you can redirect the user to a confirmation page
        return redirect()->back()->with('success', 'Exercise Files (without correction) added successfully.');
    }

    public function storeWithCorrection(Request $request)
    {
       
       // Validate the uploaded files
        $request->validate([
            'exercise_files_with_correction.*' => 'required|file|mimes:pdf,doc,docx|max:10240', // Example validation rules
            'correction_files.*' => 'required|file|mimes:pdf,doc,docx|max:10240', // Example validation rules
        ]);

        // Get the course ID from the form
        $courseId = $request->input('course_id');

        // Store the uploaded files
        $course = Cours::findOrFail($courseId);
        $this->storeFiles($request, $course, 'exercise_files_with_correction', 'correction_files');

        // Optionally, you can redirect the user to a confirmation page
        return redirect()->back()->with('success', 'Exercise Files with Correction added successfully.');
    }

    private function storeFiles($request, $course, $exerciseFileInputName, $correctionFileInputName = null)
    {
        if ($request->hasFile($exerciseFileInputName)) {
            foreach ($request->file($exerciseFileInputName) as $key => $exerciseFile) {
                $fileName = time() . '_' . $exerciseFile->getClientOriginalName(); // Using original file name for uniqueness
                $exerciseFilePath = $exerciseFile->storeAs('public/' . $exerciseFileInputName, $fileName);

                $exerciseFileModel = $course->exerciseFiles()->create([
                    'name' => $fileName,
                    'path' => $exerciseFilePath,
                    'user_id' => auth()->id(),
                ]);

                // If correction files are provided, store them
                if ($correctionFileInputName && $request->hasFile($correctionFileInputName)) {
                    $correctionFile = $request->file($correctionFileInputName)[$key];
                    $correctionFileName = time() . '_' . $correctionFile->getClientOriginalName();
                    $correctionFilePath = $correctionFile->storeAs('public/' . $correctionFileInputName, $correctionFileName);

                    // Save correction file details to database
                    $exerciseFileModel->correctionFiles()->create([
                        'name' => $correctionFileName,
                        'path' => $correctionFilePath,
                        'exercise_file_id' => $exerciseFileModel->id,
                    ]);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(ExerciseFile $exerciseFile)
    {

        try {
            // Authorize the delete action
            $this->authorize('delete', $exerciseFile);

            // Delete the cours file
            $exerciseFile->delete();

            return redirect()->back()->with('success', 'Cours file deleted successfully.');
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'You are not authorized to delete this file.');
        }
        // Check if the user is authorized to delete the exercise file

    }


}
