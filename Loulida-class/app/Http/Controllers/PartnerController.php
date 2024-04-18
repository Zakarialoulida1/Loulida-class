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
            // 2048 KB (2MB) maximum size
        ]);

        // File upload logic
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('cv'), $cvName); // Move the file to 'public/cv' directory

            // Store the file name and form data in the database
            Partner::create([
                'type' => $request->type,
                'phone' => $request->input('Phone'),
                'description' => $request->input('Description'),
                'cv' => $cvName,
                'Address'=>$request->Address,
                'user_id' => auth()->id(), // Set the default status
            ]);
        }

        return redirect()->back()->with('success', 'Your application as a teacher has been submitted successfully.');
    }

    public function showPartnerRequests()
    {
        $partnerRequests = Partner::with('user')->get();
       
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
 
    $partner->save();
    return redirect()->back()->with('success', 'Partner request confirmed successfully');
}
public function UnConfirm( $id)
{
    $partner = Partner::findOrFail($id);
    $partner->status = 'non_valide'; // Assuming you're updating the status to 'valide'
    $partner->save();

    // Redirect back to the page where the request originated
    return redirect()->back()->with('success', 'Partner request UnConfirmed successfully');
}

}
