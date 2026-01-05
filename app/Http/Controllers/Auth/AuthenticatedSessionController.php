<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('auth.login'); //tampilkan form login
    }

    /**
     * Handle an incoming authentication request.
     */
    // proses login (verify user)
    public function store(LoginRequest $request): RedirectResponse //method store utk trima data dri form dan redirect ke dashboard klu sudah
    {
        $request->authenticate(); //custom method di file req.auth.loginrequest, utk validasi input, query database, pass verfication
        $request->session()->regenerate(); //regenerate session, hapus data session sbeleumnya (jika ada), dan generate token untuk form request, session baru : create dgn ses id baru, cookie: update dgn sess id baru, csrf: regenerate utk security 

        return redirect()->intended(route('dashboard', absolute: false)); //smart redirect, klu user trying to access route tertentu tpi gak auntheticated maka redirect ke route itu, klu gada intended route, redirect ke dahsboard
    }

    /**
     * Destroy an authenticated session.
     */
    // -----------UTK LOGOUT---------------
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); //logout user dr guard web (default guard utk user biasa), hapus user dri session, session msi exist di server tapi tidak link ke user

        $request->session()->invalidate(); //invalidate session, buat session gak valid

        $request->session()->regenerateToken(); //regrenerate csrf token, utk keamanan

        return redirect('/'); //redirect ke homepage
    }
}
