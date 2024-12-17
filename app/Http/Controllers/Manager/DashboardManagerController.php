<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Carbon\Carbon;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class DashboardManagerController extends Controller
{
    public function index()
    {
        // Ambil username dan role pengguna yang sedang login
        $user = Auth::user(); // Pastikan pengguna sudah login
        $email = $user->email; // Default ke 'Guest' jika null
        $role = $user->role; // Default ke 'User' jika null

        // Mengambil jumlah pemesanan hari ini
        $pemesananHariIni = Pemesanan::whereDate('created_at', Carbon::today())->count();

        // Mengambil jumlah pemesanan bulan ini
        $pemesananBulanIni = Pemesanan::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Mengambil jumlah pemesanan tahun ini
        $pemesananTahunIni = Pemesanan::whereYear('created_at', Carbon::now()->year)->count();

        // Mengambil jumlah kendaraan yang tersedia
        $kendaraanTersedia = Kendaraan::where(
            'status',
            'tersedia'
        )->count();

        // Mengambil jumlah kendaraan yang tidak tersedia
        $kendaraanTidakTersedia = Kendaraan::where('status', 'tidak_tersedia')->count();

        // Mendapatkan kendaraan yang paling sering digunakan bulan ini
        $kendaraanBulanIni = Pemesanan::select('kendaraan_id', DB::raw('COUNT(*) as total'))
        ->whereMonth('tanggal_pemesanan', Carbon::now()->month)
            ->whereYear('tanggal_pemesanan', Carbon::now()->year)
            ->groupBy('kendaraan_id')
            ->orderByDesc('total')
            ->first();

        // Mendapatkan kendaraan yang paling sering digunakan tahun ini
        $kendaraanTahunIni = Pemesanan::select('kendaraan_id', DB::raw('COUNT(*) as total'))
        ->whereYear('tanggal_pemesanan', Carbon::now()->year)
            ->groupBy('kendaraan_id')
            ->orderByDesc('total')
            ->first();

        // Mengambil data kendaraan dari ID
        $kendaraanBulanIni = $kendaraanBulanIni ? Kendaraan::find($kendaraanBulanIni->kendaraan_id) : null;
        $kendaraanTahunIni = $kendaraanTahunIni ? Kendaraan::find($kendaraanTahunIni->kendaraan_id) : null;
        // Mendapatkan driver tersibuk bulan ini
        $driverBulanIni = Pemesanan::select('driver_id', DB::raw('COUNT(*) as total'))
        ->whereMonth('tanggal_pemesanan', Carbon::now()->month)
            ->whereYear('tanggal_pemesanan', Carbon::now()->year)
            ->groupBy('driver_id')
            ->orderByDesc('total')
            ->first();

        // Mendapatkan driver tersibuk tahun ini
        $driverTahunIni = Pemesanan::select('driver_id', DB::raw('COUNT(*) as total'))
        ->whereYear('tanggal_pemesanan', Carbon::now()->year)
            ->groupBy('driver_id')
            ->orderByDesc('total')
            ->first();

        // Mengambil data driver berdasarkan ID
        $driverBulanIni = $driverBulanIni ? Driver::find($driverBulanIni->driver_id) : null;
        $driverTahunIni = $driverTahunIni ? Driver::find($driverTahunIni->driver_id) : null;

        // Ambil data kendaraan dan jumlah pemesanan per bulan
        $pemakaianKendaraan = Pemesanan::selectRaw('MONTH(tanggal_pemesanan) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        // Format data untuk Chart.js
        $bulanLabels = [];
        $jumlahPemesanan = [];

        foreach ($pemakaianKendaraan as $data) {
            $bulanLabels[] = Carbon::create()->month($data->bulan)->translatedFormat('F');
            $jumlahPemesanan[] = $data->total;
        }
        return view('Manager.Dashboard', [
            'email' => $email,
            'role' => $role,
            'pemesananHariIni' => $pemesananHariIni,
            'pemesananBulanIni' => $pemesananBulanIni,
            'pemesananTahunIni' => $pemesananTahunIni,
            'kendaraanTersedia' => $kendaraanTersedia,
            'kendaraanTidakTersedia' => $kendaraanTidakTersedia,
            'kendaraanBulanIni' => $kendaraanBulanIni,
            'kendaraanTahunIni' => $kendaraanTahunIni,
            'driverBulanIni' => $driverBulanIni,
            'driverTahunIni' => $driverTahunIni,
            'bulanLabels' => $bulanLabels,
            'jumlahPemesanan' => $jumlahPemesanan,
        ]);
    }
}
