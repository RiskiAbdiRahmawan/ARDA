@extends('layouts.app')
@section('content')
<div class="my-10 px-2">
  <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
      <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
          <path fill="#06d"
            d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
            data-original="#0066dd" />
          <path fill="#00ad3c"
            d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
            data-original="#00ad3c" />
          <path fill="#00831e"
            d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
            data-original="#00831e" />
          <path fill="#0084ff"
            d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
            data-original="#0084ff" />
          <path fill="#ff4131"
            d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
            data-original="#ff4131" />
          <path fill="#ffba00"
            d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
            data-original="#ffba00" />
        </svg>
      </div>
      <div class="mt-4">
        <h3 class="text-xl font-bold text-gray-800">Jumlah Pemesanan</h3>
      </div>  
      <div class="mt-6">
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Pemesanan Hari Ini</p>
            <p class="text-sm text-gray-800">{{ $pemesananHariIni }}</p>
            {{-- <p class="text-sm text-gray-800">25</p> --}}
        </div>
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Pemesanan Bulan Ini</p>
            <p class="text-sm text-gray-800">{{ $pemesananBulanIni }}</p>
            {{-- <p class="text-sm text-gray-800">25</p> --}}
        </div>
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Pemesanan Tahun Ini</p>
            <p class="text-sm text-gray-800">{{ $pemesananTahunIni }}</p>
            {{-- <p class="text-sm text-gray-800">25</p> --}}
        </div>
      </div>
    </div>
    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
      <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
          <path fill="#06d"
            d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
            data-original="#0066dd" />
          <path fill="#00ad3c"
            d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
            data-original="#00ad3c" />
          <path fill="#00831e"
            d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
            data-original="#00831e" />
          <path fill="#0084ff"
            d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
            data-original="#0084ff" />
          <path fill="#ff4131"
            d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
            data-original="#ff4131" />
          <path fill="#ffba00"
                    d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                    data-original="#ffba00" />
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
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
          <path fill="#06d"
            d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
            data-original="#0066dd" />
          <path fill="#00ad3c"
            d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
            data-original="#00ad3c" />
          <path fill="#00831e"
            d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
            data-original="#00831e" />
          <path fill="#0084ff"
            d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
            data-original="#0084ff" />
          <path fill="#ff4131"
            d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
            data-original="#ff4131" />
          <path fill="#ffba00"
            d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
            data-original="#ffba00" />
        </svg>
      </div>

      <div class="mt-4">
        <h3 class="text-xl font-bold text-gray-800">Kendaraan Paling Sering Digunakan</h3>
      </div>

      <div class="mt-6">
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Bulan Ini</p>
            @if ($kendaraanBulanIni)
              <p class="text-sm text-gray-800">{{ $kendaraanBulanIni->nama_kendaraan }} ({{ $kendaraanBulanIni->id }})</p>
            @endif
        </div>
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Tahun Ini</p>
            @if ($kendaraanTahunIni)
              <p class="text-sm text-gray-800">{{ $kendaraanTahunIni->nama_kendaraan }} ({{ $kendaraanTahunIni->id }})</p>
            @endif
        </div>
      </div>
    </div>
    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
      <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
          <path fill="#06d"
            d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
            data-original="#0066dd" />
          <path fill="#00ad3c"
            d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
            data-original="#00ad3c" />
          <path fill="#00831e"
            d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
            data-original="#00831e" />
          <path fill="#0084ff"
            d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
            data-original="#0084ff" />
          <path fill="#ff4131"
            d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
            data-original="#ff4131" />
          <path fill="#ffba00"
            d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
            data-original="#ffba00" />
        </svg>
      </div>

      <div class="mt-4">
        <h3 class="text-xl font-bold text-gray-800">Driver Tersibuk</h3>
        {{-- <p class="mt-2 text-sm text-gray-800">Bulan Ini</p> --}}
      </div>

      <div class="mt-6">
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Bulan Ini</p>
            @if($driverBulanIni)
                <p class="text-sm text-gray-800">{{ $driverBulanIni->nama_driver }}</p>
            @endif
        </div>
        <div class="flex mb-2">
            <p class="text-sm text-gray-800 flex-1">Tahun Ini</p>
            @if($driverTahunIni)
              <p class="text-sm text-gray-800">{{ $driverTahunIni->nama_driver }}</p>
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
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // sidebar
      document.querySelectorAll('#sidebar ul > li > .menu-item').forEach((item) => {
        item.addEventListener('click', () => {
          // Remove classes from all menu items
          document.querySelectorAll('#sidebar ul > li > .menu-item').forEach((otherItem) => {
            otherItem.classList.remove('bg-[#d9f3ea]', 'text-green-700');
            otherItem.classList.add('text-gray-800');
          });

          // Add classes to the clicked item
          item.classList.add('bg-[#d9f3ea]', 'text-green-700');
          item.classList.remove('text-gray-800');
        });
      });


      
      let sidebarToggleBtn = document.getElementById('toggle-sidebar');
      let sidebarCollapseMenu = document.getElementById('sidebar-collapse-menu');

      sidebarToggleBtn.addEventListener('click', () => {
        if (!sidebarCollapseMenu.classList.contains('open')) {
            sidebarCollapseMenu.classList.add('open');
            sidebarCollapseMenu.style.cssText = 'width: 250px; visibility: visible; opacity: 1;';
            sidebarToggleBtn.style.cssText = 'left: 236px;';
        } else {
            sidebarCollapseMenu.classList.remove('open');
            sidebarCollapseMenu.style.cssText = 'width: 32px; visibility: hidden; opacity: 0;';
            sidebarToggleBtn.style.cssText = 'left: 10px;';
        }

      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPemakaian').getContext('2d');
    const grafikPemakaian = new Chart(ctx, {
        type: 'bar', // Jenis grafik (bar, line, dll)
        data: {
            labels: {!! json_encode($bulanLabels) !!}, // Nama bulan
            datasets: [{
                label: 'Jumlah Pemakaian Kendaraan',
                data: {!! json_encode($jumlahPemesanan) !!}, // Jumlah pemesanan
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
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