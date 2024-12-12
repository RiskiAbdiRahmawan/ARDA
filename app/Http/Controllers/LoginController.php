<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek apakah username dan password valid
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan pengguna ke dashboard berdasarkan role mereka
            if ($user->role === 'admin') {
                return "Berhasil Login Admin";
                // return redirect()->route('Pemilik.Dashboard'); // Route untuk dashboard pemilik
            } elseif ($user->role === 'manager') {
                return "Berhasil Login Manager";
                // return redirect()->route('Agent.Dashboard'); // Route untuk dashboard agent
            }
        }else{
            return back()->withErrors([
                'login' => 'Your email or password is incorrect.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
