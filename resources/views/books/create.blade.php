<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Laravel CRUD App</title>
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
                            <h1 class="m-0">Tambah Buku</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Buku</h3>
                        </div>
                        <div class="card-body">
                            <!-- Form Tambah Buku -->
                            <form id="addBookForm" enctype="multipart/form-data">
                                @csrf
                                <!-- Judul Buku -->
                                <div class="form-group">
                                    <label for="title">Judul Buku</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul buku" required>
                                </div>

                                <!-- Kategori Buku -->
                                <div class="form-group">
                                    <label for="category_id">Kategori Buku</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="" disabled selected>Pilih kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan deskripsi buku" required></textarea>
                                </div>

                                <!-- Gambar -->
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>

                                <!-- Feedback -->
                                <div id="responseMessage" class="mt-3"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Handle form submission using AJAX
            $('#addBookForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                let formData = new FormData(this); // Create FormData for file upload

                // AJAX request
                $.ajax({
                    url: "{{ route('books.store') }}", // Route to store book
                    type: "POST",
                    data: formData,
                    processData: false, // Prevent jQuery from auto-processing data
                    contentType: false, // Prevent jQuery from overriding Content-Type
                    success: function (response) {
                        $('#responseMessage').html(
                            `<div class="alert alert-success">${response.message}</div>`
                        );
                        $('#addBookForm')[0].reset(); // Reset form fields
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';

                        for (let field in errors) {
                            errorMessages += `<p>${errors[field][0]}</p>`;
                        }

                        $('#responseMessage').html(
                            `<div class="alert alert-danger">${errorMessages}</div>`
                        );
                    }
                });
            });
        });
    </script>
</body>
</html>
