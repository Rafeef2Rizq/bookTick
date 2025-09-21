 <!-- Sidebar Toggle Button (for mobile) -->
        <button class="md:hidden p-4" onclick="toggleSidebar()">
            ☰
        </button>

        @php $route = Route::currentRouteName(); @endphp

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-md px-6 py-8 h-screen overflow-y-auto transform md:translate-x-0 -translate-x-full transition-transform duration-300 fixed md:static z-50">
                <!-- Close button for mobile -->
    <button class="md:hidden absolute top-4 right-4 text-2xl" onclick="toggleSidebar()">
        ✕
    </button>
            <h2 class="text-2xl font-bold text-gray-800 mb-8">📊 Admin</h2>
            <nav class="space-y-4">
                <a href="{{ route('admin.books.index') }}"
                   class="block font-medium {{ $route == 'admin.books.index' ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                    📚 Manage Books
                </a>
                <a href="{{ route('admin.users.index') }}"
                   class="block font-medium {{ $route == 'admin.users.index' ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                    👤 Manage Users
                </a>
                 <a href="{{ route('books.index') }}"
                   class="block font-medium {{ $route == 'admin.users.index' ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                    📚 View Books
                </a>
                <form method="POST" action="{{ route('logout') }}" class="pt-6">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-red-600 hover:text-red-800 font-medium">
                        🚪 Logout
                    </button>
                </form>
            </nav>
        </aside>