<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'XYZ Information System')</title>
    <!-- CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800 font-sans antialiased overflow-hidden">

    <!-- Container Layout Utama (Mengisi tinggi layar penuh) -->
    <div class="flex flex-col h-screen overflow-hidden" x-data="{ sidebarOpen: true }">

        <!-- INCLUDE HEADER -->
        @include('layouts.partials.header')

        <!-- Bagian Bawah Header: Sidebar + Main Content Wrapper -->
        <div class="flex flex-1 overflow-hidden">

            <!-- INCLUDE SIDEBAR -->
            @include('layouts.partials.sidebar')

            <!-- Main Content Area & Footer Wrapper -->
            <div class="flex-1 flex flex-col overflow-y-auto">

                <!-- Main Content Body -->
                <main class="flex-1 p-6">
                    <!-- Area Pengisi Konten Blade Lain -->
                    @yield('content')
                </main>

                <!-- INCLUDE FOOTER -->
                @include('layouts.partials.footer')

            </div>

        </div>

    </div>

    <!-- Script Sederhana untuk Toggle Sidebar (Vanilla JS) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('main-sidebar');

            if (btnToggle && sidebar) {
                btnToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>

</html>
