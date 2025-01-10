<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa kategori buku
        Category::create(['name' => 'Fiksi']);
        Category::create(['name' => 'Non-Fiksi']);
        Category::create(['name' => 'Pendidikan']);
        Category::create(['name' => 'Teknologi']);
        Category::create(['name' => 'Sejarah']);
    }
}
