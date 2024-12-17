<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatPemakaian;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemesananExport;
use App\Models\Log;

class PemesananController extends Controller
{
    public function index()
    {
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null
        $users = User::all();
        $kendaraans = Kendaraan::where('status', 'tersedia')->get(); // Hanya kendaraan dengan status 'tersedia'
        $drivers = Driver::all();
        // Ambil semua data pemesanan dengan relasi
        $pemesanans = Pemesanan::with(['user', 'driver', 'kendaraan'])->get();
        return view('Pemesanan', compact('pemesanans', 'email', 'role', 'users', 'kendaraans', 'drivers'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'driver_id' => 'required|exists:drivers,driver_id',
            'kendaraan_id' => 'required|exists:kendaraans,kendaraan_id',
            'tanggal_pemesanan' => 'required|date',
            'status' => 'required|string',
            'manager1_status' => 'nullable|in:disetujui,ditolak,pending',  // Validasi status manager 1
            'manager2_status' => 'nullable|in:disetujui,ditolak,pending',  // Validasi status manager 2
        ]);

        // Tentukan status awal
        $validated['manager1_status'] = $validated['manager1_status'] ?? 'pending';
        $validated['manager2_status'] = $validated['manager2_status'] ?? 'pending';

        // Simpan data pemesanan ke database
        $pemesanan = Pemesanan::create($validated);

        Log::create([
            'action' => 'create',
            'model' => 'Pemesanan',
            'model_id' => $pemesanan->pemesanan_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menambahkan Pemesanan dengan ID: ' . $pemesanan->pemesanan_id,
        ]);
        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil ditambahkan!');
    }

    public function update(Request $request, $pemesanan_id)
    {
        // Cari data berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);

        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'driver_id' => 'required|exists:drivers,driver_id',
            'kendaraan_id' => 'required|exists:kendaraans,kendaraan_id',
            'tanggal_pemesanan' => 'required|date',
            'status' => 'required|string',
            'manager1_status' => 'nullable|in:disetujui,ditolak,pending',
            'manager2_status' => 'nullable|in:disetujui,ditolak,pending',
        ]);

        // Update data di database
        $pemesanan->update($validated);
        Log::create([
            'action' => 'update',
            'model' => 'Pemesanan',
            'model_id' => $pemesanan->pemesanan_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Mengubah Pemesanan dengan ID: ' . $pemesanan->pemesanan_id,
        ]);

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    public function destroy($pemesanan_id)
    {
        // Cari data berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);

        // Hapus data dari database
        $pemesanan->delete();
        Log::create([
            'action' => 'delete',
            'model' => 'Pemesanan',
            'model_id' => $pemesanan->pemesanan_id,
            'user_id' => Auth::user()->user_id,
            'description' => 'Menghapus Pemesanan dengan ID: ' . $pemesanan->pemesanan_id,
        ]);

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dihapus!');
    }

    // Fungsi untuk menolak pemesanan oleh Manager 1
    public function tolakManager1($pemesanan_id)
    {
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);
        $pemesanan->manager1_status = 'ditolak';
        $pemesanan->status = 'ditolak'; // Jika manager 1 menolak, status pemesanan langsung ditolak
        $pemesanan->save();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan ditolak oleh Manager 1!');
    }

    // Fungsi untuk menyetujui pemesanan oleh Manager 1
    public function setujuManager1($pemesanan_id)
    {
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);
        $pemesanan->manager1_status = 'disetujui';
        $pemesanan->manager2_status = 'pending'; // Menunggu persetujuan Manager 2
        $pemesanan->save();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan disetujui oleh Manager 1!');
    }

    // Fungsi untuk menolak pemesanan oleh Manager 2
    public function tolakManager2($pemesanan_id)
    {
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);
        $pemesanan->manager2_status = 'ditolak';
        $pemesanan->status = 'ditolak'; // Jika manager 2 menolak, status pemesanan ditolak
        $pemesanan->save();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan ditolak oleh Manager 2!');
    }

    // Fungsi untuk menyetujui pemesanan oleh Manager 2
    public function setujuManager2($pemesanan_id)
    {
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);
        if ($pemesanan->manager1_status == 'disetujui') {
            $pemesanan->manager2_status = 'disetujui';
            $pemesanan->status = 'disetujui'; // Pemesanan disetujui jika kedua manager menyetujui
            $pemesanan->save();

            // Perbarui status kendaraan menjadi 'tidak tersedia'
            $kendaraan = Kendaraan::findOrFail($pemesanan->kendaraan_id);
            $kendaraan->status = 'tidak tersedia';
            $kendaraan->save();

            // Tambahkan langsung riwayat pemakaian kendaraan
            RiwayatPemakaian::create([
                'kendaraan_id' => $pemesanan->kendaraan_id,
                'pemesanan_id' => $pemesanan->pemesanan_id,
                'tanggal' => $pemesanan->tanggal_pemesanan,
            ]);

            return redirect()->route('pemesanans.index')->with('success', 'Pemesanan disetujui oleh Manager 2 dan ditambahkan ke riwayat pemakaian!');        }

        return redirect()->route('pemesanans.index')->with('error', 'Pemesanan tidak bisa disetujui oleh Manager 2, karena Manager 1 belum menyetujui.');
    }

}
