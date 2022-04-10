<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class LogoutController extends Controller
{
    /**
     * Log out account user
     * 
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        FacadesSession::flush();

        Auth::logout();

        return redirect("login");
    }
}
