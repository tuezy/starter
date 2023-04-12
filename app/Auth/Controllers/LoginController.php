<?php

namespace App\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

abstract class LoginController extends Authentication
{

    /**
     * Handle an authGuard attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->has("remember_me") ? true : false;

        if ($this->checkLogin($credentials, $remember)) {

            $request->session()->regenerate();

            Event::dispatch("auth.login.after", [$this->authGuard()->user()]);

            return redirect()->intended($this->redirectAfterLogin());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public abstract function redirectAfterLogin();

    protected function checkLogin($credentials, $remember = false){
        return $this->authGuard()->attempt($credentials, $remember);
    }

}