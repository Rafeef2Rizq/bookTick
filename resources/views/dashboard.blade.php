<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

<x-sidebar/>

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

   <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>

    <!-- CSS for Mobile Sidebar -->
    <style>
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(0); /* Sidebar visible by default */
                transition: transform 0.3s ease-in-out;
            }
            #sidebar.-translate-x-full {
                transform: translateX(-100%); /* Hide sidebar when toggled */
            }
        }
    </style>
</x-app-layout>
