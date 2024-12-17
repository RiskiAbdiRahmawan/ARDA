@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Konsumsi BBM Management</h1>
        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Create Konsumsi BBM</button>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Kendaraan</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Jumlah BBM</th>
                    <th class="border px-4 py-2">Biaya</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konsumsiBBMs as $konsumsiBBM)
                    <tr>
                        <td class="border px-4 py-2">{{ $konsumsiBBM->konsumsi_bbm_id }}</td>
                        <td class="border px-4 py-2">{{ $konsumsiBBM->kendaraan->nama }}</td>
                        <td class="border px-4 py-2">{{ $konsumsiBBM->tanggal }}</td>
                        <td class="border px-4 py-2">{{ $konsumsiBBM->jumlah_bbm }}</td>
                        <td class="border px-4 py-2">{{ $konsumsiBBM->biaya }}</td>
                        <td class="border px-4 py-2">
                            <button onclick="editKonsumsiBBM({{ $konsumsiBBM }})" class="text-blue-500">Edit</button>
                            <form action="{{ route('konsumsiBBM.destroy', $konsumsiBBM->konsumsi_bbm_id) }}" method="POST" class="inline">
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
        <h2 id="modal-title" class="text-lg font-bold mb-4">Create Konsumsi BBM</h2>
        <form id="konsumsi-bbm-form" action="{{ route('konsumsiBBM.store') }}" method="POST">
            @csrf
            <input type="hidden" id="_method" name="_method" value="POST">
            <div class="mb-4">
                <label for="kendaraan_id" class="block text-gray-700">Kendaraan:</label>
                <select id="kendaraan_id" name="kendaraan_id" class="w-full border-gray-300 rounded mt-1">
                    @foreach ($kendaraans as $kendaraan)
                        <option value="{{ $kendaraan->kendaraan_id }}">{{ $kendaraan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="jumlah_bbm" class="block text-gray-700">Jumlah BBM:</label>
                <input type="number" id="jumlah_bbm" name="jumlah_bbm" value="{{ old('jumlah_bbm') }}" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="biaya" class="block text-gray-700">Biaya:</label>
                <input type="number" id="biaya" name="biaya" value="{{ old('biaya') }}" class="w-full border-gray-300 rounded mt-1">
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
        document.getElementById('konsumsi-bbm-form').reset();
        document.getElementById('_method').value = 'POST';
        document.getElementById('modal-title').textContent = 'Create Konsumsi BBM';
    }

    function editKonsumsiBBM(konsumsiBBM) {
        openModal();
        document.getElementById('modal-title').textContent = 'Edit Konsumsi BBM';
        document.getElementById('konsumsi-bbm-form').action = `/konsumsiBBM/${konsumsiBBM.konsumsi_bbm_id}`;
        document.getElementById('_method').value = 'PUT';
        document.getElementById('kendaraan_id').value = konsumsiBBM.kendaraan_id;
        document.getElementById('tanggal').value = konsumsiBBM.tanggal;
        document.getElementById('jumlah_bbm').value = konsumsiBBM.jumlah_bbm;
        document.getElementById('biaya').value = konsumsiBBM.biaya;
    }
</script>
@endsection
