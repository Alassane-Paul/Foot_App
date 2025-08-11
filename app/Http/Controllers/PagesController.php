<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login() 
    {
        return view('auth.login');
    }

    public function register () 
    {
        return view('auth.register');
    }

    //Page de réinitialisation du mot de passe

    public function passwordReset ()
    {
        return view('auth.reset');
    }
}
