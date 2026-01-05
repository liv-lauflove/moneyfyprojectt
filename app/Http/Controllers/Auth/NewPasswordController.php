<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]); //$request berisi query parameter dari email link, token n email di url parameter (hidden)
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // validate input
        $request->validate([
            'token' => ['required'], //token dri email link
            'email' => ['required', 'email'], //email dari email link
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                // callback function dijalankan jika token valid

                // sub-step A:update password
                $user->forceFill([
                    'password' => Hash::make($request->password), //hash password baru
                    'remember_token' => Str::random(60), //generate remember token baru
                ])->save(); //update users set password... remember_token...... where email=....

                // sub-step B: trigger event
                event(new PasswordReset($user)); //send notification email, invalidate other sessions
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        // return response
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status)) //success: redirect ke login dgn message
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]); //error: redirect back dgn error message
    }
}
