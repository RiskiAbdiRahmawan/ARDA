<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportPemesanan()
    {
        $fileName = 'laporan_pemesanan_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');
            // Baris header untuk kolom CSV
            fputcsv($file, ['ID', 'User', 'Driver', 'Kendaraan', 'Tanggal Pemesanan', 'Status']);

            // Ambil data pemesanan
            $pemesanans = Pemesanan::with(['user', 'driver', 'kendaraan'])->get();

            foreach ($pemesanans as $pemesanan) {
                fputcsv($file, [
                    $pemesanan->pemesanan_id,
                    $pemesanan->user->nama,
                    $pemesanan->driver->nama,
                    $pemesanan->kendaraan->nama,
                    $pemesanan->tanggal_pemesanan,
                    $pemesanan->status,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
