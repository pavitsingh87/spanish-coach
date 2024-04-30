<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="favicon.ico">
     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <!--<link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">-->
     <style>
        .bg-black{
        --tw-bg-opacity: 1;
        background-color: rgb(39 46 59);
        }
        #sidebar nav
        {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
    @include('layouts.admin.navigation')

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
        @include('layouts.admin.header')

            <!-- Main Content -->
            <div class="flex-1">
                <div class="p-4">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </main>
        <!-- Main Content End -->

    </div>
    <!-- ===== Page Wrapper End ===== -->

    <script>
        // Sidebar open/close functionality
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        openSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>
</body>
</html>
