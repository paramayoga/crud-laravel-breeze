<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD App - Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        
        <!-- Main Content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="m-0">{{ __('Daftar Buku') }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <!-- Tombol Tambah Buku -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg">
                            <i class="fa fa-plus"></i> Tambah Buku
                        </a>
                    </div>

                    <!-- Daftar Buku -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Daftar Buku yang Tersedia') }}</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($books as $book)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="mb-1"><strong>{{ $book->title }}</strong></h5>
                                                <p class="mb-1">Kategori: <span class="badge bg-info">{{ $book->category->name }}</span></p>
                                                <p class="mb-2">Deskripsi: {{ $book->description }}</p>
                                                @if ($book->image)
                                                    <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="img-thumbnail" style="max-width: 150px;">
                                                @endif
                                            </div>
                                            <div>
                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
