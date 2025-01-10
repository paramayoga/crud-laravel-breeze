<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Menampilkan daftar buku dengan filter kategori
    public function index(Request $request)
    {
        $categories = Category::all();
        $books = Book::query();

        if ($request->has('category_id')) {
            $books->where('category_id', $request->category_id);
        }

        $books = $books->get();

        return view('books.index', compact('books', 'categories'));
    }

    // Menampilkan form untuk membuat buku baru
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // Menyimpan buku baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi gambar
        ]);
    
        // Menyimpan gambar
        if ($request->hasFile('image')) {
            // Menyimpan gambar di direktori 'public/images' dan mendapatkan path
            $imagePath = $request->file('image')->store('public/images');
        } else {
            $imagePath = null;
        }
    
        // Membuat Buku
        Book::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagePath, // simpan path gambar
        ]);
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit buku
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // Memperbarui buku
    public function update(Request $request, Book $book)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['title', 'description', 'category_id']);

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($book->image) {
            Storage::delete($book->image);
        }
        // Menyimpan gambar baru
        $data['image'] = $request->file('image')->store('public/images');
    }

    // Memperbarui Buku
    $book->update($data);

    return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
}

    // Menghapus buku
    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::delete($book->image);
        }

        $book->delete();

        return redirect()->route('books.index');
    }
}
