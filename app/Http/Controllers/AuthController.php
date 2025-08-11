<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetRequest;
use App\Models\Reset;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login (AuthRequest $request) 
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            
            return redirect()->route('match.liste')->with('success', 'Connexion réussie. Bienvenue !');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Les informations d\'identification ne correspondent pas.',
            ]);
        }
    }

    public function register (RegisterRequest $request) 
    {
        $user = $request->validated();
        $user['password'] = bcrypt($user['password']);
        User::create($user);

        Mail::raw("Bienvenu sur FootMedia. Votre e-mail de connexion est : {$user['email']} et votre mot de passe est : {$request->password}", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Bienvenue sur FootMedia');
        });
        return redirect()->route('login')->with('success', 'Inscription réussie. Veuillez vous connecter.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }

    public function passwordReset (ResetRequest $request) 
    {
        $email = User::where('email', $request->email)->first() ;
        if ($email)
        {
            Reset::where('email', $email->email)->delete();
            $code = Str::random(6);
            Reset::updateOrInsert(
                ['email' => $email->email],
            [
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(10), // expire dans 10 min
                'updated_at' => now(),
                'created_at' => now()
            ]);

            Mail::raw("Votre code de réinitialisation est : $code", function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Code de réinitialisation de mot de passe');
            });

            return view('auth.resetconfirm', compact('email'));

        } else {
            return redirect()->back()->withErrors([
                'email' => 'E-mail incorrect.',
            ]);
        }
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $reset = Reset::where('email', $request->email)
                      ->where('code', $request->code)
                      ->where('expires_at', '>', now())
                      ->first();

        if ($reset) {
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();

            // Supprimer le code de réinitialisation après utilisation
            $reset->delete();

            return redirect()->route('login')->with('success', 'Mot de passe modifié avec succès. Veuillez vous connecter.');
        } else {
            return redirect()->back()->withErrors([
                'code' => 'Code de réinitialisation invalide ou expiré.',
            ]);
        }
    }



    
}
