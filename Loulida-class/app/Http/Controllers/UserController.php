<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Formation;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
       if(auth()->user()->role === "Etudiant"){
        $formationcount = Payment::where('user_id',Auth()->id())->where('status','validé')->count();
       
       }else{
        $formationcount = Formation::count();
        
       }
       $partnerCount=Partner::where('status','validé')->count();
       $courscount =Cours::where('user_id',Auth()->id())->count();
        $etudiantCount=User::where('role','Etudiant')->count();

        return view('profile', compact('user','formationcount','courscount','partnerCount','etudiantCount'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->description = $request->description;
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($user->image) {
                $imagePath = public_path('images') . '/' . $user->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Upload and store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }
    
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    
}
