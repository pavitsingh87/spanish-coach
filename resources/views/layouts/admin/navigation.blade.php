 <!-- ===== Sidebar Start ===== -->
 <aside id="sidebar" class="fixed left-0 top-0 z-50 sm:w-1/2 lg:w-1/5 flex flex-col h-screen overflow-y-auto bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0 -translate-x-full">
            <!-- SIDEBAR HEADER -->
            <div class="flex items-center justify-between px-6 py-5.5 lg:py-6.5">
                <!-- Sidebar logo or title -->
                <div class="text-white font-bold text-lg h-full pt-5 pb-2">Admin Panel</div>
                <!-- Close button -->
                <button id="closeSidebarBtn" class="text-white focus:outline-none lg:hidden transition-transform duration-300 transform hover:scale-110">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- SIDEBAR LINKS -->
            <nav class="flex-1 px-2 py-4">
            <a href="/" class="text-gray-300 hover:text-white hover:bg-gray-700 px-4 py-2 rounded-md mb-2 block">Home</a>
                <a href="/pv-mappings" class="text-gray-300 hover:text-white hover:bg-gray-700 px-4 py-2 rounded-md mb-2 block">P-V Mapping</a>
                <a href="/users" class="text-gray-300 hover:text-white hover:bg-gray-700 px-4 py-2 rounded-md mb-2 block">Users</a>
                <a href="/profile" class="text-gray-300 hover:text-white hover:bg-gray-700 px-4 py-2 rounded-md mb-2 block">Profile</a>
                
            </nav>
        </aside>
        <!-- ===== Sidebar End ===== -->