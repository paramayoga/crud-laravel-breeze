<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Laravel CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="m-0">{{ __('Edit Buku') }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Form Edit Buku') }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Judul Buku -->
                                <div class="form-group">
                                    <label for="title">Judul Buku</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
                                </div>

                                <!-- Kategori Buku -->
                                <div class="form-group">
                                    <label for="category_id">Kategori Buku</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $book->category_id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $book->description) }}</textarea>
                                </div>

                                <!-- Gambar -->
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                    @if ($book->image)
                                        <div class="mt-3">
                                            <p>Gambar Saat Ini:</p>
                                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="img-thumbnail" style="max-width: 150px;">
                                        </div>
                                    @endif
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
