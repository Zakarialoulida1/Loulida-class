<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\CoursFile;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CoursFileController extends Controller
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoursFile $coursFile)
    {
        try {
            // Authorize the delete action
            $this->authorize('delete', $coursFile);
    
            // Delete the cours file
            $coursFile->delete();
            
            return redirect()->back()->with('success', 'Cours file deleted successfully.');
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'You are not authorized to delete this file.');
        }
    }
 public function addFile(Request $request)
    {

       
        // Validate the uploaded file
        $request->validate([
            'course_files.*' => 'required|file|mimes:pdf,doc,docx|max:10240', // Example validation rules
        ]);

        // Get the course ID from the form
        $courseId = $request->input('course_id');
 
        // Store the uploaded file
     
        // Associate the file with the corresponding course
        $course = Cours::findOrFail($courseId);
        $this->storeFiles($request, $course, 'course_files');
    
    

        // Optionally, you can redirect the user to a confirmation page
        return redirect()->back()->with('success', 'File added successfully.');
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
}
    

