<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Book
        </h2>
    </x-slot>

    <div class="py-8 max-w-xl mx-auto sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded shadow">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-6 space-y-6">
    @csrf
    <div>
        <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full ..." placeholder="Enter book title">
    </div>

    <div>
        <label for="author" class="block text-gray-700 font-semibold mb-2">Author</label>
        <input type="text" name="author" id="author" value="{{ old('author') }}" required class="w-full ..." placeholder="Enter author name">
    </div>

    <div>
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
        <textarea name="description" id="description" rows="4" placeholder="Enter book description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
    </div>

    <div>
        <label for="price" class="block text-gray-700 font-semibold mb-2">Price (USD)</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required class="w-full ..." placeholder="Enter price">
    </div>

    <div>
        <label for="image" class="block text-gray-700 font-semibold mb-2">Book Image (optional)</label>
        <input type="file" name="image" id="image" accept="image/*" class="w-full ...">
    </div>
<div>
            <label for="pdf_file">Upload PDF</label>
        <input type="file" name="pdf_file" id="pdf_file" accept=".pdf">
    </div>
    
    <button type="submit">Save Book</button>

</div>
    <div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">Save Book</button>
    </div>
</form>

    </div>

</x-app-layout>
