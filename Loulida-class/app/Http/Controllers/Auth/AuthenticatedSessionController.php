<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */


     public function store(LoginRequest $request): RedirectResponse
     {
 
         $request->authenticate();
 
 
         $request->session()->regenerate();
 
 
         if ($request->user()->isBlocked()) {
 
             Auth::logout();
             return redirect()->route('login')->with('error', 'Votre compte est bloqué. Veuillez contacter l\'administrateur.');
         }
 
 
             return redirect()->intended(RouteServiceProvider::HOME);
     }

     
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();
    //     $valid=(auth()->user()->ban == '0');

        
    //     if ($valid){
    //         $request->session()->regenerate();

    //         return redirect()->intended(RouteServiceProvider::HOME);
    //     } else {
    //         return redirect()->back()->with('error', 'Vous etes Suspendu');
    //     }
    // }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
