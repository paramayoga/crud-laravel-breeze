<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori buku
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $category = new Category();
        $category->name = $request->name;
        $category->save();
    
        return response()->json([
            'message' => 'Kategori berhasil ditambahkan!',
        ], 201);
    }

    // Menampilkan form untuk mengedit kategori buku
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Memperbarui kategori buku
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->only('name'));

        return redirect()->route('categories.index');
    }

    // Menghapus kategori buku
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
