@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Kendaraan</h1>

    <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4" onclick="openModal()">Tambah Kendaraan</button>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jenis</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Pemilik</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kendaraans as $kendaraan)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $kendaraan->nama }}</td>
                    <td class="border px-4 py-2">{{ $kendaraan->jenis }}</td>
                    <td class="border px-4 py-2">{{ $kendaraan->status }}</td>
                    <td class="border px-4 py-2">{{ $kendaraan->user->nama ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">
                        <button class="bg-yellow-500 text-white px-2 py-1 rounded" onclick="editKendaraan({{ $kendaraan }})">Edit</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="deleteKendaraan({{ $kendaraan->kendaraan_id }})">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="kendaraan-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4" id="modal-title">Tambah Kendaraan</h2>
        <form id="kendaraan-form">
            @csrf
            <input type="hidden" id="kendaraan_id" name="kendaraan_id">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium">Nama Kendaraan</label>
                <input type="text" id="nama" name="nama" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="jenis" class="block text-sm font-medium">Jenis Kendaraan</label>
                <select id="jenis" name="jenis" class="w-full border rounded px-3 py-2" required>
                    <option value="angkutan orang">Angkutan Orang</option>
                    <option value="angkutan barang">Angkutan Barang</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status Kendaraan</label>
                <select id="status" name="status" class="w-full border rounded px-3 py-2" required>
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak tersedia">Tidak Tersedia</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium">Pemilik Kendaraan</label>
                <input type="number" id="user_id" name="user_id" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="closeModal()">Batal</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>



<script>
    function openModal() {
    document.getElementById('kendaraan-modal').classList.remove('hidden');
    document.getElementById('kendaraan-form').reset(); // Reset form ketika modal dibuka
    document.getElementById('modal-title').innerText = "Tambah Kendaraan"; // Mengatur judul modal
    document.getElementById('kendaraan_id').value = ''; // Kosongkan ID kendaraan
}
function closeModal() {
    document.getElementById('kendaraan-modal').classList.add('hidden');
}
function editKendaraan(kendaraan) {
    openModal(); // Membuka modal
    document.getElementById('modal-title').innerText = "Edit Kendaraan"; // Mengubah judul modal
    document.getElementById('kendaraan_id').value = kendaraan.kendaraan_id; // Menetapkan ID kendaraan ke field hidden
    document.getElementById('nama').value = kendaraan.nama; // Mengisi field nama
    document.getElementById('jenis').value = kendaraan.jenis; // Mengisi field jenis
    document.getElementById('status').value = kendaraan.status; // Mengisi field status
    document.getElementById('user_id').value = kendaraan.user_id; // Mengisi field user_id
}

// Menangani form submit untuk tambah/edit kendaraan
document.getElementById('kendaraan-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const kendaraanId = document.getElementById('kendaraan_id').value;
    const url = kendaraanId ? `/kendaraans/${kendaraanId}` : '/kendaraans';
    const method = kendaraanId ? 'PUT' : 'POST';

    const kendaraanData = {
        nama: document.getElementById('nama').value,
        jenis: document.getElementById('jenis').value,
        status: document.getElementById('status').value,
        user_id: document.getElementById('user_id').value,
    };

    fetch(url, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(kendaraanData),  // Mengirimkan data kendaraan dalam format JSON
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            location.reload();  // Reload untuk memperbarui data kendaraan
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan, coba lagi.');
    })
    .finally(() => closeModal());  // Menutup modal setelah proses selesai
});

// Menangani penghapusan kendaraan
function deleteKendaraan(id) {
    if (confirm("Apakah Anda yakin ingin menghapus kendaraan ini?")) {
        fetch(`/kendaraans/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
                location.reload();  // Refresh untuk memperbarui data setelah penghapusan
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus kendaraan, coba lagi.');
        });
    }
}

</script>
@endsection
