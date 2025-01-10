<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Main Sidebar Container -->

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="card-header text-center">
                            <h1 class="h3 mb-0">{{ __('Kategori Buku') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-lg">
                        {{ __('Tambah Kategori') }}
                    </a>
                </div>
    
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $category->name }}</span>
    
                            <div class="btn-group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
    
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
    
                <div class="mt-4">
                    <div class="alert alert-info text-center">
                        <p>{{ __('Anda dapat mengelola kategori buku dengan mudah menggunakan fitur di atas.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


