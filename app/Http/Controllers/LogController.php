<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class LogController extends Controller
{
    public function index()
    {
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null
        $logs = Log::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('LogAplikasi', compact('logs','email','role'));
    }

}
