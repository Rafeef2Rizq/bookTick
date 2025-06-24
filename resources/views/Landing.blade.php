<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHaven - Find Your Next Read</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans leading-normal tracking-normal">

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Welcome to BookHaven</h1>
            <p class="text-lg md:text-xl mb-8">Discover your next favorite book with us 📚</p>
            <a href="{{ route('books.index') }}" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded shadow hover:bg-gray-100 transition">
                Browse Books
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Why Choose Us?</h2>
                <p class="text-gray-600 mt-2">We bring you curated books and a delightful shopping experience.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-4xl mb-4">📖</div>
                    <h3 class="font-bold text-xl mb-2">Wide Selection</h3>
                    <p class="text-gray-600">Thousands of books from all genres and categories.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-4xl mb-4">🚚</div>
                    <h3 class="font-bold text-xl mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">We deliver your books quickly and safely to your door.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-4xl mb-4">💳</div>
                    <h3 class="font-bold text-xl mb-2">Secure Checkout</h3>
                    <p class="text-gray-600">Safe and encrypted payment methods for your peace of mind.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-indigo-600 text-white text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Start Your Reading Journey Today!</h2>
        <p class="mb-6 text-lg">Join thousands of readers discovering new stories every day.</p>
        <a href="{{ route('register') }}" class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded hover:bg-gray-100 transition">
            Sign Up Now
        </a>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-gray-800 text-gray-300 text-center text-sm">
        &copy; {{ date('Y') }} BookHaven. All rights reserved.
    </footer>

</body>
</html>
