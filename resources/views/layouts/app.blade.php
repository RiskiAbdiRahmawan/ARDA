<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARDA</title>
    @vite('resources/css/app.css','resources/js/app.js')
</head>
<body>
    <div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
        <div class="flex items-start">
            <x-sidebar :email="$email" :role="$role" />  <!-- Komponen Sidebar -->
            <button id="toggle-sidebar"class='lg:hidden w-8 h-8 z-[100] fixed top-[36px] left-[10px] cursor-pointer bg-[#007bff] flex items-center justify-center rounded-full outline-none transition-all duration-500'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="w-3 h-3" viewBox="0 0 55.752 55.752">
                <path
                    d="M43.006 23.916a5.36 5.36 0 0 0-.912-.727L20.485 1.581a5.4 5.4 0 0 0-7.637 7.638l18.611 18.609-18.705 18.707a5.398 5.398 0 1 0 7.634 7.635l21.706-21.703a5.35 5.35 0 0 0 .912-.727 5.373 5.373 0 0 0 1.574-3.912 5.363 5.363 0 0 0-1.574-3.912z"
                    data-original="#000000" />
                </svg>
            </button>
            <section class="main-content w-full px-8">
                <x-header />
                @yield('content')
            </section>
        </div>
    </div>
</body>
</html>