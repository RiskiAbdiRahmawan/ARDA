<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARDA</title>
    @vite('resources/css/app.css','resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@heroicons/react@1.0.6/outline/index.js"></script>
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    // sidebar
    document
        .querySelectorAll("#sidebar ul > li > .menu-item")
        .forEach((item) => {
            item.addEventListener("click", () => {
                // Remove classes from all menu items
                document
                    .querySelectorAll("#sidebar ul > li > .menu-item")
                    .forEach((otherItem) => {
                        otherItem.classList.remove(
                            "bg-[#d9f3ea]",
                            "text-green-700"
                        );
                        otherItem.classList.add("text-gray-800");
                    });

                // Add classes to the clicked item
                item.classList.add("bg-[#d9f3ea]", "text-green-700");
                item.classList.remove("text-gray-800");
            });
        });

    let sidebarToggleBtn = document.getElementById("toggle-sidebar");
    let sidebarCollapseMenu = document.getElementById("sidebar-collapse-menu");

    sidebarToggleBtn.addEventListener("click", () => {
        if (!sidebarCollapseMenu.classList.contains("open")) {
            sidebarCollapseMenu.classList.add("open");
            sidebarCollapseMenu.style.cssText =
                "width: 250px; visibility: visible; opacity: 1;";
            sidebarToggleBtn.style.cssText = "left: 236px;";
        } else {
            sidebarCollapseMenu.classList.remove("open");
            sidebarCollapseMenu.style.cssText =
                "width: 32px; visibility: hidden; opacity: 0;";
            sidebarToggleBtn.style.cssText = "left: 10px;";
        }
    });
});
    </script>
</body>
</html>