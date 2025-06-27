<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BookTick | Discover Your Next Read</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    html {
      scroll-behavior: smooth;
    }
    .fade-in {
      animation: fadeInUp 1s ease-out;
    }
    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-sky-50 text-gray-900 font-sans">
  @php
  use App\Models\Book;

    $books=Book::all();
  @endphp
  <!-- Nav -->
  <nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-sky-700">📚 BookTick</h1>
      <ul class="flex space-x-6 text-sky-700 font-medium">
        <li><a href="#home" class="hover:text-sky-500">Home</a></li>
        <li><a href="#about" class="hover:text-sky-500">About</a></li>
        <li><a href="#books" class="hover:text-sky-500">Books</a></li>
        <li><a href="#testimonials" class="hover:text-sky-500">Testimonials</a></li>
        <li><a href="#contact" class="hover:text-sky-500">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero -->
  <section id="home" class="bg-gradient-to-br from-sky-100 via-white to-sky-200 py-20 fade-in">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
      <div>
        <span class="text-sm bg-yellow-400 text-white px-2 py-1 rounded-full uppercase tracking-wider">New</span>
        <h1 class="text-5xl font-bold text-sky-900 leading-tight mt-2">Discover Your Next Read 📚</h1>
        <p class="mt-4 text-xl text-sky-700">Your gateway to discovering and reserving amazing books for all ages.</p>
        <a href="#books" class="mt-6 inline-block bg-sky-600 text-white px-6 py-3 rounded-full hover:bg-sky-700 transition-transform duration-300 hover:scale-105">Explore Books</a>
      </div>
      <div class="w-full max-w-md mx-auto relative">
        <img src="images/banars/banar.png" class="rounded-xl shadow-xl" alt="Hero Book">
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="bg-white py-20 fade-in">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-sky-700 mb-4">About BookTick</h2>
      <p class="text-gray-700 text-lg">BookTick is designed for book lovers to explore, discover, and reserve their favorite reads with ease. We combine technology with a passion for reading to create a simple, elegant, and engaging experience.</p>
    </div>
  </section>

  <!-- Book Collection -->
<section id="books" class="bg-white py-20 fade-in">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl font-bold text-center text-sky-700 mb-12">Our Book Collection</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @forelse ($books as $book)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 hover:-translate-y-1 transform">
          <img
            src="{{ $book->image ? asset('images/' . $book->image) : asset('images/default-book.png') }}"
            alt="{{ $book->title }}"
            class="w-full h-56 object-cover"
          >
          <div class="p-4">
            <h3 class="text-lg font-bold text-gray-800 mb-1">
              <a href="{{ route('books.show', $book->id) }}" class="hover:text-sky-600">
                {{ $book->title }}
              </a>
            </h3>
            <p class="text-sm text-gray-600 mb-1">Author: {{ $book->author }}</p>
            <p class="text-green-600 font-semibold mb-3">Price: ${{ $book->price }}</p>
            <a href="{{ route('cart.add', $book->id) }}"
               class="inline-block bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700 text-sm transition">
              Add to Cart
            </a>
          </div>
        </div>
      @empty
        <p class="text-center col-span-4 text-gray-500">No books available at the moment.</p>
      @endforelse
    </div>

    <div class="text-center mt-10">
      <a href="{{ route('books.index') }}"
         class="inline-block px-6 py-3 bg-sky-600 text-white rounded-full hover:bg-sky-700 transition">
        View All Books
      </a>
    </div>
  </div>
</section>


  <!-- Testimonials -->
  <section id="testimonials" class="bg-sky-100 py-20 fade-in">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-sky-700 mb-10">What Our Readers Say</h2>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
          <img src="https://i.pravatar.cc/100?img=1" class="w-16 h-16 rounded-full mb-3" alt="User Avatar">
          <p class="text-gray-800 italic">“An intuitive and beautiful interface! I love reserving books with BookTick.”</p>
          <p class="mt-2 font-semibold text-sky-600">— Amina R.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
          <img src="https://i.pravatar.cc/100?img=2" class="w-16 h-16 rounded-full mb-3" alt="User Avatar">
          <p class="text-gray-800 italic">“So many great recommendations I would've never found otherwise.”</p>
          <p class="mt-2 font-semibold text-sky-600">— Daniel K.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="bg-gradient-to-r from-sky-600 to-sky-700 text-white py-16 fade-in">
    <div class="max-w-3xl mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-4">Ready to Find Your Next Favorite Book?</h2>
      <p class="text-lg mb-6">Join our community of readers today and start your journey with BookTick.</p>
      <a href="#contact" class="inline-block bg-white text-sky-700 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-100 transition">Contact Us</a>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="bg-white py-20 fade-in">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-sky-700 mb-4">Get in Touch</h2>
      <p class="text-gray-700 mb-6">Questions, feedback, or just want to say hi? We’d love to hear from you.</p>
      <form class="grid gap-4 max-w-xl mx-auto">
        <input type="text" placeholder="Your Name" class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-sky-600">
        <input type="email" placeholder="Your Email" class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-sky-600">
        <textarea rows="4" placeholder="Your Message" class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-sky-600"></textarea>
        <button type="submit" class="bg-sky-600 text-white px-6 py-2 rounded hover:bg-sky-700 transition">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-sky-200 text-sky-900 py-10 fade-in">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center md:text-left">
      <div>
        <h3 class="text-xl font-bold text-sky-800">BookTick</h3>
        <p class="text-sm mt-2">Discover. Reserve. Read. The ultimate platform for book lovers.</p>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-sky-800">Links</h4>
        <ul class="mt-2 space-y-1 text-sm">
          <li><a href="#home" class="hover:underline">Home</a></li>
          <li><a href="#about" class="hover:underline">About</a></li>
          <li><a href="#books" class="hover:underline">Books</a></li>
          <li><a href="#testimonials" class="hover:underline">Testimonials</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-sky-800">Contact</h4>
        <p class="text-sm mt-2">support@booktick.com</p>
        <p class="text-sm">+1 234 567 890</p>
      </div>
    </div>
    <div class="text-center text-sm text-sky-700 mt-6">&copy; 2025 BookTick. All rights reserved.</div>
  </footer>
</body>
</html>