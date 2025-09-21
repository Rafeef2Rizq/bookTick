<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Book
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title" class="block font-semibold text-gray-700">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" required>
                    </div>

                    {{-- Author --}}
                    <div class="mb-4">
                        <label for="author" class="block font-semibold text-gray-700">Author</label>
                        <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <label for="description" class="block font-semibold text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500"
                            placeholder="Enter book description">{{ old('description', $book->description) }}</textarea>
                    </div>

                    {{-- Price --}}
                    <div class="mb-4">
                        <label for="price" class="block font-semibold text-gray-700">Price ($)</label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $book->price) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" required>
                    </div>

                    {{-- Current Image --}}
                    <div class="mb-4">
                        <p class="text-gray-700 font-semibold mb-2">Current Image:</p>
                        <img src="{{ asset('images/' . $book->image) }}" class="w-32 h-32 object-cover rounded shadow">
                    </div>

                    {{-- New Image --}}
                    <div class="mb-6">
                        <label for="image" class="block font-semibold text-gray-700">Change Image</label>
                        <input type="file" name="image" id="image" class="w-full">
                    </div>

                    {{-- Submit --}}
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                            Update Book
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
