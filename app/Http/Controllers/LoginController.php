<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

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
                Log::create([
                    'user_id' => $user->user_id, // Ganti sesuai dengan nama kolom ID di model User Anda
                    'action' => 'login',
                    'model' => 'User',
                    'model_id' => Auth::user()->user_id,
                    'description' => 'Admin berhasil login',
                ]);
                return redirect()->route('admin.dashboard');
                // return "Berhasil Login Admin";
                // return redirect()->route('Pemilik.Dashboard'); // Route untuk dashboard pemilik
            } elseif ($user->role === 'manager') {
                Log::create([
                    'user_id' => $user->user_id, // Ganti sesuai dengan nama kolom ID di model User Anda
                    'action' => 'login',
                    'model' => 'User',
                    'model_id' => Auth::user()->user_id,
                    'description' => 'Manager berhasil login',
                ]);
                return redirect()->route('manager.dashboard');
                // return "Berhasil Login Manager";
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

        return view('login');
    }
}
