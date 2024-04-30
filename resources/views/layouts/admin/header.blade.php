<!-- ===== Header Start ===== -->
<header class="bg-gray-200 py-4">
                <!-- Header content for mobile view -->
                <div class="flex justify-between items-center px-4 lg:hidden">
                    <!-- Hamburger icon -->
                    <button id="openSidebarBtn" class="text-gray-700 focus:outline-none transition-transform duration-300 transform hover:scale-110">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                    <!-- Authenticated user -->
                    <div class="text-gray-600">
                        @auth
                            Welcome, {{ Auth::user()->name }}
                            <form method="POST" action="{{ route('logout') }}" class="ml-4 inline">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                            </form>
                        @endauth
                    </div>
                </div>
                <!-- Header content for large screens -->
                <div class="hidden lg:flex justify-end pr-6">
                    @auth
                        <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="ml-4">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                        </form>
                    @endauth
                </div>
            </header>
            <!-- ===== Header End ===== -->