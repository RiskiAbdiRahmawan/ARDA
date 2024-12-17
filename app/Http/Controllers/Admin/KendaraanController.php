<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class KendaraanController extends Controller
{
    public function index()
    {
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null
        $kendaraans = Kendaraan::with('user')->latest()->get();
        return view('Admin.Kendaraan', compact('kendaraans','email','role'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:angkutan orang,angkutan barang',
            'status' => 'required|in:tersedia,tidak tersedia',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $kendaraan = Kendaraan::create($validated);
        Log::create([
            'action' => 'create',
            'model' => 'Kendaraan',
            'model_id' => $kendaraan->kendaraan_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menambahkan Kendaraan dengan nama: ' . $kendaraan->nama,
        ]);
        return response()->json(['message' => 'Kendaraan berhasil ditambahkan']);
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:angkutan orang,angkutan barang',
            'status' => 'required|in:tersedia,tidak tersedia',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $kendaraan->update($validated);
        Log::create([
            'action' => 'update',
            'model' => 'Kendaraan',
            'model_id' => $kendaraan->kendaraan_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menambahkan Kendaraan dengan nama: ' . $kendaraan->nama,
        ]);
        return response()->json(['message' => 'Kendaraan berhasil diperbarui']);
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        Log::create([
            'action' => 'delete',
            'model' => 'Kendaraan',
            'model_id' => $kendaraan->kendaraan_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menambahkan Kendaraan dengan nama: ' . $kendaraan->nama,
        ]);
        return response()->json(['message' => 'Kendaraan berhasil dihapus']);
    }
}
