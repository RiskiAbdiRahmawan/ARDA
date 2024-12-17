<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPemakaian;
use Illuminate\Support\Facades\Auth;


class RiwayatPemakaianController extends Controller
{
    public function index(){
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null
        // Mengambil data riwayat pemakaian yang telah disetujui
        $riwayatPemakaian = RiwayatPemakaian::with('kendaraan', 'pemesanan.driver')->get();

        // Mengirim data riwayat pemakaian ke view
        return view('RiwayatPemakaian', compact('riwayatPemakaian', 'email', 'role'));
    }
}
