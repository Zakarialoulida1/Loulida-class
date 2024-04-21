<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function create(Request $request)
    {
        // Fetch the formation ID from the request parameters
        $formation = Formation::with('matieres', 'cycleEducative')
            ->findOrFail($request->input('formation_id'));


        // Pass the formation ID to the payment creation view
        return view('payments.create', ['formation' => $formation]);
    }
    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([

            'formation_id' => 'required|integer',

        ]);
        if ($request->hasFile('recu')) {
            $recu = $request->file('recu');
            $recuName = time() . '.' . $recu->getClientOriginalName();
            $recu->move(public_path('recu'), $recuName);
        }else{
            $recuName ='';
        }

        // Create a new Payment record
        Payment::create([
            'user_id' => auth()->id(),
            'formation_id' => $request->formation_id,
            'path' => $recuName,
        ]);

        // Redirect back or wherever you want after successful submission
        return redirect()->back()->with('success', 'Payment submitted successfully!');
    }
}
