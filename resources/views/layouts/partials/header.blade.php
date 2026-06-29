<header class="bg-slate-900 text-white flex items-center justify-between px-4 h-14 shadow-md z-20">
    <!-- Kiri: Brand Logo & Toggle -->
    <div class="flex items-center space-x-3">
        <!-- Logo Area -->
        <a href="#"
            class="flex items-center space-x-2 font-bold text-lg tracking-wider text-blue-400 hover:text-blue-300">
            <span class="bg-blue-600 text-white px-2 py-0.5 rounded text-sm">S-IT</span>
            <span class="hidden sm:inline">Asset Management</span>
        </a>
        <!-- Tombol Toggle Sidebar -->
        <button id="sidebar-toggle"
            class="p-1 rounded text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Kanan: Quick Actions & Profile -->
    <div class="flex items-center space-x-4">
        <!-- Tombol Tambah Cepat (+ Create New) -->
        <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1.5 rounded transition">
            + Tambah Baru
        </button>

        <!-- Profil User -->
        <div class="flex items-center space-x-2 text-sm text-slate-300">
            <span class="hidden md:inline font-medium">Ahmad Akhromi</span>
            <!-- Form Logout -->
            <form action="{{ route('user.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="text-red-400 hover:text-red-300 text-xs font-semibold bg-transparent border-0 cursor-pointer">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
