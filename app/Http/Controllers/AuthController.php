<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('registreren');
    }

    public function register(Request $request)
    {
       $data = $request->validate([
    'voornaam' => 'required|string|max:255',
    'achternaam' => 'required|string|max:255',
    'email' => ['required', 'email', 'unique:users,email', 'regex:/^9025\d{3}@.+$/'],
    'studentnummer' => ['required', 'string', 'size:7', 'regex:/^9025\d{3}$/', 'unique:users,studentnummer'],
    'password' => 'required|min:8|confirmed',
    'terms' => 'accepted',
    ], [
    'studentnummer.size' => 'Het studentnummer moet exact 7 cijfers zijn.',
    'studentnummer.regex' => 'Het studentnummer moet beginnen met 9025.',
    'email.regex' => 'Je e-mail moet beginnen met je studentnummer (bijv. 9025314@student.zadkine.nl).',
    'terms.accepted' => 'Je moet akkoord gaan met de voorwaarden.',
    ]);

        $user = User::create([
            'name' => $request->voornaam . ' ' . $request->achternaam,
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'studentnummer' => $request->studentnummer,
            'password' => bcrypt($request->password),
            'rol' => 'student',
        ]);


        Auth::login($user);

        return redirect('/dashboard');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $loginField = $request->email;
        $password = $request->password;

        // Probeer eerst met email, dan met studentnummer
        $user = User::where('email', $loginField)
                    ->orWhere('studentnummer', $loginField)
                    ->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $request->has('remember'));
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'Ongeldige inloggegevens.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
