<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar -->
        <button class="md:hidden p-4" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
            ☰
        </button>

        @php $route = Route::currentRouteName(); @endphp
        <aside id="sidebar" class="w-64 bg-white shadow-md px-6 py-8 h-screen overflow-y-auto transform md:translate-x-0 -translate-x-full transition-transform duration-300 fixed md:static z-50">
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

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome Admin, {{ auth()->user()->name }}</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                    <h2 class="text-xl font-bold text-blue-600 mb-2">Total Books</h2>
                    <p class="text-2xl text-gray-800">{{ \App\Models\Book::count() }}</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                    <h2 class="text-xl font-bold text-green-600 mb-2">Total Users</h2>
                    <p class="text-2xl text-gray-800">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                    <h2 class="text-xl font-bold text-yellow-600 mb-2">Cart Sessions</h2>
                    <p class="text-2xl text-gray-800">
                        Active: {{ session()->has('cart') ? count(session('cart')) : 0 }}
                    </p>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
