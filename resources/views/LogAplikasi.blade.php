@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Riwayat Log Aplikasi</h1>

    <div class="bg-white shadow rounded-lg p-6 mt-6">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">User</th>
                    <th class="border px-4 py-2">Aksi</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td class="border px-4 py-2">{{ $log->id }}</td>
                        <td class="border px-4 py-2">{{ $log->user ? $log->user->nama : 'Sistem' }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($log->action) }}</td>
                        <td class="border px-4 py-2">{{ $log->description }}</td>
                        <td class="border px-4 py-2">{{ $log->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
