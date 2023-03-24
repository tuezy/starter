<?php

namespace App\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class AuthenticationController extends Controller
{
    protected $guard;

    /**
     * Handle an authGuard attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if ($this->checkLogin($credentials)) {

            $request->session()->regenerate();

            Event::dispatch("auth.login.after", [$this->authGuard()->user()]);

            return redirect()->intended($this->redirectAfterLogin());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Event::dispatch("auth.logout.before", [$this->authGuard()->user()]);

        $this->authGuard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Event::dispatch("auth.logout.after", [$this->authGuard()->user()]);

        return redirect($this->redirectAfterLogout());
    }

    protected function guard(){
        return 'web';
    }

    protected function checkLogin($credentials){
        return $this->authGuard()->attempt($credentials);
    }

    protected function authGuard(){
        return Auth::guard($this->guard());
    }

    protected function redirectAfterLogin(){
        return 'dashboard';
    }

    protected function redirectAfterLogout(){
        return '/';
    }
}