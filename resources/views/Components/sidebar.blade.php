@if (Auth::user()->role === 'admin')
<nav id="sidebar" class="lg:min-w-[250px] w-max max-lg:min-w-8">
    <div id="sidebar-collapse-menu" class="bg-white shadow-lg h-screen fixed top-0 left-0 overflow-auto z-[99] lg:w-[250px] max-lg:w-0 max-lg:invisible transition-all duration-500">
        <div class="pt-8 pb-2 px-6 sticky top-0 bg-white min-h-[80px] z-[100]">
            <a href="javascript:void(0)" class="outline-none"><img src="{{ asset('images/logo-removebg-preview.png') }}"
                alt="logo" class='w-[100px]' />
            </a>
        </div>
  
          <div class="py-6 px-6">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"class="menu-item text-gray-700 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <i class="fas fa-home-alt text-gray-700 w-[18px] h-[18px] mr-4"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kendaraans.index') }}"
                    class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <i class="fas fa-car text-gray-700 w-[18px] h-[18px] mr-4"></i>
                    <span>Manajemen Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pemesanans.index') }}"class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                        <i class="fas fa-car text-gray-700 w-[18px] h-[18px] mr-4"></i>
                        <span>Pemesanan Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('drivers.index') }}"
                    class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <i class="fas fa-user-tie w-[18px] h-[18px] mr-4 text-gray-700"></i>
                    <span>Manajemen Driver</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayatPemakaian') }}"class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                        <i class="fas fa-history w-[18px] h-[18px] mr-4 text-gray-700"></i>
                        <span>Riwayat Pemakaian Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('konsumsiBBM.index') }}"class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                        <i class="fas fa-gas-pump w-[18px] h-[18px] mr-4 text-gray-700"></i>
                        <span>Konsumsi Bahan Bakar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"
                    class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <i class="fas fa-users w-[18px] h-[18px] mr-4 text-gray-700"></i>
                    <span>Manajemen User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logs.index') }}"
                    class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                        viewBox="0 0 64 64">
                        <path
                        d="M61.4 29.9h-6.542a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h33.978a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-15.687 7.287A5.187 5.187 0 1 1 50.9 32a5.187 5.187 0 0 1-5.187 5.187ZM2.6 13.1h5.691a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2H26.571a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2Zm14.837-7.287A5.187 5.187 0 0 1 22.613 11a5.187 5.187 0 0 1-10.364 0 5.187 5.187 0 0 1 5.187-5.187ZM61.4 50.9H35.895a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h15.015a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-34.65 7.287A5.187 5.187 0 1 1 31.937 53a5.187 5.187 0 0 1-5.187 5.187Z"
                        data-name="Layer 47" data-original="#000000" />
                    </svg>
                    <span>Log Aplikasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@elseif (Auth::user()->role === 'manager')
<nav id="sidebar" class="lg:min-w-[250px] w-max max-lg:min-w-8">
    <div id="sidebar-collapse-menu" class="bg-white shadow-lg h-screen fixed top-0 left-0 overflow-auto z-[99] lg:w-[250px] max-lg:w-0 max-lg:invisible transition-all duration-500">
        <div class="pt-8 pb-2 px-6 sticky top-0 bg-white min-h-[80px] z-[100]">
            <a href="javascript:void(0)" class="outline-none"><img src="{{ asset('images/logo-removebg-preview.png') }}"
                alt="logo" class='w-[170px]' />
            </a>
        </div>
          <div class="py-6 px-6">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('manager.dashboard') }}"class="menu-item text-green-700 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <i class="fas fa-home-alt w-[18px] h-[18px] mr-4 text-gray-700"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pemesanans.index') }}"class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                        <i class="fas fa-car w-[18px] h-[18px] mr-4 text-gray-700"></i>
                        <span>Pemesanan Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayatPemakaian') }}"class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                        <i class="fas fa-history w-[18px] h-[18px] mr-4 text-gray-700"></i>
                        <span>Riwayat Pemakaian Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logs.index') }}"
                    class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-[#d9f3ea] rounded-md px-3 py-3 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                        viewBox="0 0 64 64">
                        <path
                        d="M61.4 29.9h-6.542a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h33.978a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-15.687 7.287A5.187 5.187 0 1 1 50.9 32a5.187 5.187 0 0 1-5.187 5.187ZM2.6 13.1h5.691a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2H26.571a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2Zm14.837-7.287A5.187 5.187 0 0 1 22.613 11a5.187 5.187 0 0 1-10.364 0 5.187 5.187 0 0 1 5.187-5.187ZM61.4 50.9H35.895a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h15.015a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-34.65 7.287A5.187 5.187 0 1 1 31.937 53a5.187 5.187 0 0 1-5.187 5.187Z"
                        data-name="Layer 47" data-original="#000000" />
                    </svg>
                    <span>Log Aplikasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endif
