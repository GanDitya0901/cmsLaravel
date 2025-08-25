<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\throwException;

class AuthController extends Controller
{
    public function showLogin() {
        return view("auth.login");
    }

    public function showRegister() {
        return view("auth.register");
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'username' => 'required|string',
            'password'=> 'required|string',
        ]);

        if(Auth::attempt($validated)) {
            $user = Auth::user();

            if($user->role === 'master') {
                return redirect()->route('show.masterdashboard');
            } elseif($user->role === 'admin') {
                return redirect()->route('show.adminDashboard');
            } else {
                return redirect()->route('show.landingPage');
            }
        }

        throw ValidationException::withMessages([
            'credentials' => 'Incorrect credentials'
        ]);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'username' => 'string|unique:users|required|min:5|max:100', 
            'email' => 'required|email|unique:users', 
            'password' => 'required|string|min:10|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('show.login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
