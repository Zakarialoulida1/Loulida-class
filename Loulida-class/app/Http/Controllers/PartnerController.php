<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use App\Notifications\YouBecomeaTeacherNotification;

class PartnerController extends Controller
{
   

    public function submitTeacherForm(Request $request)
    {
        $existingTeacherRequest = Partner::where('user_id', auth()->id())
            ->where('type', 'teacher')
            ->where('status', 'non_valide')
            ->first();

        if ($existingTeacherRequest) {
            return redirect()->back()->with('error', 'You already have a pending request as a teacher.');
        }

        $request->validate([
            'Phone' => 'required',
            'Description' => 'required',
            'Address' => 'required',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'Social_Media' => 'nullable|array', // Validate as an array since it will have multiple values
            'Social_Media.facebookName' => 'nullable|string',
            'Social_Media.instagramName' => 'nullable|string',
            'Social_Media.linkedinName' => 'nullable|string',
            'matiere_id' => 'required',
        ]);
      
        // File upload logic
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '.' . $cv->getClientOriginalName();
            $cv->move(public_path('cv'), $cvName); // Move the file to 'public/cv' directory

         // Store the file name and form data in the database
            Partner::create([
                'type' => $request->type,
                'phone' => $request->input('Phone'),
                'description' => $request->input('Description'),
                'cv' => $cvName,
                'Address' => $request->Address,
                'Social_Media' => json_encode($request->input('Social_Media')) , // Store Social Media data as JSON
                'matiere_id' => $request->input('matiere_id'), // Store profession
                
                'user_id' => auth()->id(), // Set the default status
            ]);
            
        }

        return redirect()->back()->with('success', 'Your application as a teacher has been submitted successfully.');
    }

    public function showPartnerRequests()
    {
        $partnerRequests = Partner::with('user','matiere')->get();
       
        return view('admin.partner-requests', compact('partnerRequests'));
    }

    public function Confirm( $id)
{
    $partner = Partner::findOrFail($id);
    $partner->status = 'valide'; // Assuming you're updating the status to 'valide'

    $userId=$partner->user_id;
    
    $user = User::findOrFail(  $userId);


    $data = [
        'name' => $user->name,
        'email' => $user->email,
    ];
    
    $user->notify(new YouBecomeaTeacherNotification($data));
    $user->role = 'professeur';
    
    $partner->save();
    $user->save();
    return redirect()->back()->with('success', 'Now the user become a Teacher With you and her request is  confirmed successfully');
}
public function UnConfirm( $id)
{
    $partner = Partner::findOrFail($id);
    $partner->status = 'non_valide'; // Assuming you're updating the status to 'valide'
   
    $userId=$partner->user_id;
    
    $user = User::findOrFail(  $userId);


    $user->role = 'Etudiant';
    
    $partner->save();
    $user->save();
    
    return redirect()->back()->with('success', 'Partner request UnConfirmed successfully');
}

}
