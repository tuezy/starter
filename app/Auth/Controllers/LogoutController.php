<?php

namespace App\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class LogoutController extends Authentication
{
    public function logout(Request $request): RedirectResponse
    {
        Event::dispatch("auth.logout.before", [$this->authGuard()->user()]);

        $this->authGuard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Event::dispatch("auth.logout.after", [$this->authGuard()->user()]);

        return redirect($this->redirectAfterLogout());
    }

    protected function redirectAfterLogout(){
        return '/';
    }
}