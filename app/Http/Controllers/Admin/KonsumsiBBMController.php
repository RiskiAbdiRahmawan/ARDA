<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KonsumsiBBM;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class KonsumsiBBMController extends Controller
{
    public function index()
    {
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null

        $kendaraans = Kendaraan::all();
        // Ambil data konsumsiBBM dengan relasi ke kendaraan
        $konsumsiBBMs = KonsumsiBBM::with('kendaraan')->get();

        return view('Admin.KonsumsiBBM', compact('konsumsiBBMs', 'email', 'role','kendaraans'));
    }

    public function create()
    {
        // Mengambil semua kendaraan untuk form input
        $kendaraans = Kendaraan::all();
        return view('Admin.KonsumsiBBM.create', compact('kendaraans'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,kendaraan_id',
            'tanggal' => 'required|date',
            'jumlah_bbm' => 'required|numeric',
            'biaya' => 'required|numeric',
        ]);

        // Menyimpan data konsumsiBBM
        $KonsumsiBBM = KonsumsiBBM::create($request->all());
        Log::create([
            'action' => 'create',
            'model' => 'KonsumsiBBM',
            'model_id' => $KonsumsiBBM->konsumsi_bbm_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menambahkan Konsumsi BBM dengan ID: ' . $KonsumsiBBM->konsumsi_bbm_id,
        ]);

        return redirect()->route('konsumsiBBM.index')->with('success', 'Konsumsi BBM berhasil ditambahkan');
    }

    public function edit(KonsumsiBBM $konsumsiBBM)
    {
        // Mengambil kendaraan yang tersedia untuk form edit
        $kendaraans = Kendaraan::all();
        return view('Admin.KonsumsiBBM.edit', compact('konsumsiBBM', 'kendaraans'));
    }

    public function update(Request $request, KonsumsiBBM $konsumsiBBM)
    {
        // Validasi input data
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,kendaraan_id',
            'tanggal' => 'required|date',
            'jumlah_bbm' => 'required|numeric',
            'biaya' => 'required|numeric',
        ]);

        // Mengupdate data konsumsiBBM
        $konsumsiBBM->update($request->all());
        Log::create([
            'action' => 'update',
            'model' => 'KonsumsisBBM',
            'model_id' => $konsumsiBBM->konsumsi_bbm_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Mengubah Konsumsi BBM dengan ID: ' . $konsumsiBBM->jumlah_bbm,
        ]);

        return redirect()->route('konsumsiBBM.index')->with('success', 'Konsumsi BBM berhasil diperbarui');
    }

    public function destroy(KonsumsiBBM $konsumsiBBM)
    {
        // Menghapus data konsumsiBBM
        $konsumsiBBM->delete();
        Log::create([
            'action' => 'delete',
            'model' => 'KonsumsiBBM',
            'model_id' => $konsumsiBBM->konsumsi_bbm_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menghapus Konsumsi BBM dengan ID: ' . $konsumsiBBM->konsumsi_bbm_id,
        ]);

        return redirect()->route('konsumsiBBM.index')->with('success', 'Konsumsi BBM berhasil dihapus');
    }
}
