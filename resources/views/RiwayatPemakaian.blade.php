@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Riwayat Pemakaian Kendaraan</h1>

    <div class="bg-white shadow rounded-lg p-6 mt-6">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Kendaraan</th>
                    <th class="border px-4 py-2">Driver</th>
                    <th class="border px-4 py-2">Tanggal Pemesanan</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatPemakaian as $riwayat)
                    <tr>
                        <td class="border px-4 py-2">{{ $riwayat->pemesanan_id }}</td>
                        <td class="border px-4 py-2">{{ $riwayat->kendaraan->nama }}</td>
                        <td class="border px-4 py-2">{{ $riwayat->pemesanan->driver->nama }}</td>
                        <td class="border px-4 py-2">{{ $riwayat->pemesanan->tanggal_pemesanan }}</td>
                        <td class="border px-4 py-2">{{ $riwayat->pemesanan->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
