@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Pemesanan Management</h1>
        <a href="{{ route('export.pemesanan') }}" class="bg-green-500 text-white px-4 py-2 rounded">Export to CSV</a>
        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Create Pemesanan</button>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">User</th>
                    <th class="border px-4 py-2">Driver</th>
                    <th class="border px-4 py-2">Kendaraan</th>
                    <th class="border px-4 py-2">Tanggal Pemesanan</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Supervisor</th>
                    <th class="border px-4 py-2">Manager</th>
                    @if(Auth::user()->role == 'manager')  <!-- Menampilkan kolom aksi hanya untuk Manager -->
                        <th class="border px-4 py-2">Actions</th>
                    @elseif(Auth::user()->role == 'admin') <!-- Menampilkan kolom aksi hanya untuk Admin -->
                        <th class="border px-4 py-2">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanans as $pemesanan)
                    <tr>
                        <td class="border px-4 py-2">{{ $pemesanan->pemesanan_id }}</td>
                        <td class="border px-4 py-2">{{ $pemesanan->user->nama }}</td>
                        <td class="border px-4 py-2">{{ $pemesanan->driver->nama }}</td>
                        <td class="border px-4 py-2">{{ $pemesanan->kendaraan->nama }}</td>
                        <td class="border px-4 py-2">{{ $pemesanan->tanggal_pemesanan }}</td>
                        <td class="border px-4 py-2">
                        <span @class([
                            'text-yellow-500' => $pemesanan->status == 'pending',
                            'text-green-500' => $pemesanan->status == 'disetujui',
                            'text-red-500' => $pemesanan->status == 'ditolak',
                        ])>
                            {{ ucfirst($pemesanan->status) }}
                        </span>
                    </td>
                    <td class="border px-4 py-2">
                        <span @class([
                            'text-yellow-500' => $pemesanan->manager1_status == 'pending',
                            'text-green-500' => $pemesanan->manager1_status == 'disetujui',
                            'text-red-500' => $pemesanan->manager1_status == 'ditolak',
                        ])>
                            {{ ucfirst($pemesanan->manager1_status) }}
                        </span>
                    </td>
                    <td class="border px-4 py-2">
                        <span @class([
                            'text-yellow-500' => $pemesanan->manager2_status == 'pending',
                            'text-green-500' => $pemesanan->manager2_status == 'disetujui',
                            'text-red-500' => $pemesanan->manager2_status == 'ditolak',
                        ])>
                            {{ ucfirst($pemesanan->manager2_status) }}
                        </span>
                    </td>
                        @if(Auth::user()->role == 'manager') <!-- Menampilkan tombol aksi hanya untuk Manager -->
                            <td class="border px-4 py-2">
                                @if ($pemesanan->manager1_status == 'pending' && Auth::user()->nama == 'Supervisor')
                                    <button onclick="setujuManager1({{ $pemesanan->pemesanan_id }})" class="text-blue-500">Setujui Manager 1</button>
                                    <button onclick="tolakManager1({{ $pemesanan->pemesanan_id }})" class="text-red-500 ml-2">Tolak Manager 1</button>
                                @elseif ($pemesanan->manager1_status == 'disetujui' && $pemesanan->manager2_status == 'pending' && Auth::user()->nama == 'Manager Operasional')
                                    <button onclick="setujuManager2({{ $pemesanan->pemesanan_id }})" class="text-blue-500">Setujui Manager 2</button>
                                    <button onclick="tolakManager2({{ $pemesanan->pemesanan_id }})" class="text-red-500 ml-2">Tolak Manager 2</button>
                                @elseif ($pemesanan->manager1_status == 'ditolak' || $pemesanan->manager2_status == 'ditolak')
                                    <span class="text-red-500">Ditolak</span>
                                @elseif ($pemesanan->manager1_status == 'disetujui' && $pemesanan->manager2_status == 'disetujui')
                                    <span class="text-green-500">Disetujui</span>
                                @else
                                    <span class="text-gray-500">Menunggu Persetujuan</span>
                                @endif
                            </td>
                        @elseif(Auth::user()->role == 'admin') <!-- Menampilkan tombol aksi hanya untuk Admin -->
                            <td class="border px-4 py-2">
                                <button onclick="editPemesanan({{ $pemesanan }})" class="text-blue-500">Edit</button>
                                <form action="{{ route('pemesanans.destroy', $pemesanan->pemesanan_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 id="modal-title" class="text-lg font-bold mb-4">Create Pemesanan</h2>
        <form id="pemesanan-form" action="{{ route('pemesanans.store') }}" method="POST">
            @csrf
            <input type="hidden" id="_method" name="_method" value="POST">
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700">User:</label>
                <select id="user_id" name="user_id" class="w-full border-gray-300 rounded mt-1">
                    <option value="" selected>Pilih User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="driver_id" class="block text-gray-700">Driver:</label>
                <select id="driver_id" name="driver_id" class="w-full border-gray-300 rounded mt-1">
                    <option value="" selected>Pilih Driver</option>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->driver_id }}">{{ $driver->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="kendaraan_id" class="block text-gray-700">Kendaraan:</label>
                <select id="kendaraan_id" name="kendaraan_id" class="w-full border-gray-300 rounded mt-1">
                    <option value="" selected>Pilih Kendaraan</option>
                    @foreach ($kendaraans as $kendaraan)
                        <option value="{{ $kendaraan->kendaraan_id }}">{{ $kendaraan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal_pemesanan" class="block text-gray-700">Tanggal Pemesanan:</label>
                <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status:</label>
                <select id="status" name="status" class="w-full border-gray-300 rounded mt-1">
                    <option value="" selected>Pilih Status</option>
                    <option value="pengajuan">Pengajuan</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('pemesanan-form').reset();
        document.getElementById('_method').value = 'POST';
        document.getElementById('modal-title').textContent = 'Create Pemesanan';
    }

    function editPemesanan(pemesanan) {
        openModal();
        document.getElementById('modal-title').textContent = 'Edit Pemesanan';
        document.getElementById('pemesanan-form').action = `/pemesanans/${pemesanan.pemesanan_id}`;
        document.getElementById('_method').value = 'PUT';
        document.getElementById('user_id').value = pemesanan.user_id;
        document.getElementById('driver_id').value = pemesanan.driver_id;
        document.getElementById('kendaraan_id').value = pemesanan.kendaraan_id;
        document.getElementById('tanggal_pemesanan').value = pemesanan.tanggal_pemesanan;
        document.getElementById('status').value = pemesanan.status;
    }

    // Function for Manager 1 approval/rejection
    function setujuManager1(pemesanan_id) {
        window.location.href = `/pemesanans/setuju-manager1/${pemesanan_id}`;
    }

    function tolakManager1(pemesanan_id) {
        window.location.href = `/pemesanans/tolak-manager1/${pemesanan_id}`;
    }

    // Function for Manager 2 approval/rejection
    function setujuManager2(pemesanan_id) {
        window.location.href = `/pemesanans/setuju-manager2/${pemesanan_id}`;
    }

    function tolakManager2(pemesanan_id) {
        window.location.href = `/pemesanans/tolak-manager2/${pemesanan_id}`;
    }
</script>
@endsection
