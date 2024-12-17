@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Driver Management</h1>
        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Create Driver</button>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Nomor Lisensi</th>
                    <th class="border px-4 py-2">Nomor Telepon</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td class="border px-4 py-2">{{ $driver->driver_id }}</td>
                        <td class="border px-4 py-2">{{ $driver->nama }}</td>
                        <td class="border px-4 py-2">{{ $driver->nomor_lisensi }}</td>
                        <td class="border px-4 py-2">{{ $driver->nomor_telepon }}</td>
                        <td class="border px-4 py-2">
                            <button onclick="editDriver({{ $driver }})" class="text-blue-500">Edit</button>
                            <form action="{{ route('drivers.destroy', $driver->driver_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form -->
<div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 id="modal-title" class="text-lg font-bold mb-4">Create Driver</h2>
        <form id="driver-form" action="{{ route('drivers.store') }}" method="POST">
            @csrf
            <input type="hidden" id="_method" name="_method" value="POST">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="nomor_lisensi" class="block text-gray-700">Nomor Lisensi:</label>
                <input type="text" id="nomor_lisensi" name="nomor_lisensi" value="{{ old('nomor_lisensi') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="nomor_telepon" class="block text-gray-700">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700">User ID:</label>
                <input type="text" id="user_id" name="user_id" value="{{ old('user_id') }}" class="w-full border-gray-300 rounded mt-1">
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
        document.getElementById('driver-form').reset();
        document.getElementById('_method').value = 'POST';
        document.getElementById('modal-title').textContent = 'Create Driver';
    }

    function editDriver(driver) {
        openModal();
        document.getElementById('modal-title').textContent = 'Edit Driver';
        document.getElementById('driver-form').action = `/drivers/${driver.driver_id}`;
        document.getElementById('_method').value = 'PUT';
        document.getElementById('nama').value = driver.nama;
        document.getElementById('nomor_lisensi').value = driver.nomor_lisensi;
        document.getElementById('nomor_telepon').value = driver.nomor_telepon;
        document.getElementById('user_id').value = driver.user_id;
    }
</script>
@endsection
