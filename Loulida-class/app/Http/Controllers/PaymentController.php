<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Payment;
use App\Notifications\PaymentStatusNotification;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function index(){
        $payments =Payment::with('user','formation.cycleEducative')->get();

        return view('payments.index',compact('payments'));
    }
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
    
        // Check if the payment already exists for this user and formation
        $payment = Payment::where('user_id', auth()->id())
            ->where('formation_id', $request->formation_id)
            ->first();
    
        // If the payment already exists, return an error message
        if ($payment) {
            return redirect()->back()->with('error', 'You have already paid for this formation.');
        }
    
        // File upload logic
        if ($request->hasFile('recu')) {
            $recu = $request->file('recu');
            $recuName = time() . '.' . $recu->getClientOriginalName();
            $recu->move(public_path('recu'), $recuName);
        } else {
            $recuName = '';
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
    





    public function validatePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'valide';
        $payment->save();
      $payment->formation->available_place=$payment->formation->available_place - 1;
        $payment->user->notify(new PaymentStatusNotification('validated'));
        $payment->formation->save();
      
        return redirect()->back()->with('success', 'Payment validated successfully');
    }

    public function unvalidatePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'non_valide';
        $payment->save();
        $payment->formation->available_place=$payment->formation->available_place + 1;
        $payment->formation->save();
        // Notify the user
        $payment->user->notify(new PaymentStatusNotification('unvalidated'));

        return redirect()->back()->with('success', 'Payment unvalidated successfully');
    }
}
