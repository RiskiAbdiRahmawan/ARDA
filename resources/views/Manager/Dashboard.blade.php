@extends('layouts.app')
@section('content')
<div class="my-10 px-2">
  <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6">
    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
    <!-- Ganti ikon dengan ikon kalender -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M3 5h18M3 10h18M3 15h18M3 20h18M19 3v18M5 3v18"></path>
    </svg>
  </div>
  <div class="mt-4">
    <h3 class="text-xl font-bold text-gray-800">Jumlah Pemesanan</h3>
  </div>  
  <div class="mt-6">
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Pemesanan Hari Ini</p>
      <p class="text-sm text-gray-800">{{ $pemesananHariIni }}</p>
    </div>
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Pemesanan Bulan Ini</p>
      <p class="text-sm text-gray-800">{{ $pemesananBulanIni }}</p>
    </div>
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Pemesanan Tahun Ini</p>
      <p class="text-sm text-gray-800">{{ $pemesananTahunIni }}</p>
    </div>
  </div>
</div>
<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
    <!-- Ganti ikon dengan ikon mobil -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M3 12h18l-1.5-6H4.5L3 12z"></path>
      <circle cx="7.5" cy="16.5" r="1.5"></circle>
      <circle cx="16.5" cy="16.5" r="1.5"></circle>
      <path d="M3 12h18"></path>
    </svg>
  </div>
  <div class="mt-4">
    <h3 class="text-xl font-bold text-gray-800">Kendaraan Tersedia</h3>
  </div>
  <div class="mt-6">
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Kendaraan Tersedia</p>
      <p class="text-sm text-gray-800">{{ $kendaraanTersedia }}</p>
    </div>
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Kendaraan Tidak Tersedia</p>
      <p class="text-sm text-gray-800">{{ $kendaraanTidakTersedia }}</p>
    </div>
  </div>
</div>

    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
    <!-- Ikon Mobil dengan tanda populer -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M3 13h18l-1.5-6h-15l-1.5 6z"></path>
      <circle cx="7.5" cy="16.5" r="1.5"></circle>
      <circle cx="16.5" cy="16.5" r="1.5"></circle>
      <path d="M9 6h6l.5-3h-7l.5 3z"></path>
      <path d="M21 8l-3 3"></path>
      <path d="M21 8h-3"></path>
    </svg>
  </div>

  <div class="mt-4">
    <h3 class="text-xl font-bold text-gray-800">Kendaraan Paling Sering Digunakan</h3>
  </div>

  <div class="mt-6">
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Bulan Ini</p>
      @if ($kendaraanBulanIni)
        <p class="text-sm text-gray-800">{{ $kendaraanBulanIni->nama }}</p>
      @endif
    </div>
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Tahun Ini</p>
      @if ($kendaraanTahunIni)
        <p class="text-sm text-gray-800">{{ $kendaraanTahunIni->nama }}</p>
      @endif
    </div>
  </div>
</div>
    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
    <!-- Ikon Driver -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="7" r="4"></circle>
      <path d="M5.5 20h13"></path>
      <path d="M2 18l2.5-2.5"></path>
      <path d="M22 18l-2.5-2.5"></path>
    </svg>
  </div>

  <div class="mt-4">
    <h3 class="text-xl font-bold text-gray-800">Driver Tersibuk</h3>
  </div>

  <div class="mt-6">
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Bulan Ini</p>
      @if ($driverBulanIni)
        <p class="text-sm text-gray-800">{{ $driverBulanIni->nama }}</p>
      @endif
    </div>
    <div class="flex mb-2">
      <p class="text-sm text-gray-800 flex-1">Tahun Ini</p>
      @if ($driverTahunIni)
        <p class="text-sm text-gray-800">{{ $driverTahunIni->nama }}</p>
      @endif
    </div>
  </div>
</div>
  <div>
</div>
</div>
</div>
        <div class="mt-4">
    <h3 class="text-xl font-bold text-gray-800">Grafik Pemakaian Kendaraan</h3>
    <div class="mt-6">
        <canvas id="grafikPemakaian" class="w-full h-64"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPemakaian').getContext('2d');
    const grafikPemakaian = new Chart(ctx, {
        type: 'line', // Mengubah jenis grafik menjadi line
        data: {
            labels: {!! json_encode($bulanLabels) !!}, // Nama bulan
            datasets: [{
                label: 'Jumlah Pemakaian Kendaraan',
                data: {!! json_encode($jumlahPemesanan) !!}, // Jumlah pemesanan
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna area di bawah garis
                borderColor: 'rgba(54, 162, 235, 1)', // Warna garis
                borderWidth: 2, // Ketebalan garis
                tension: 0.4, // Membuat garis lebih melengkung
                fill: true // Menambahkan area warna di bawah garis
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Pemakaian'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            }
        }
    });
</script>

@endsection