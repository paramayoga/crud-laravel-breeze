<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Buku - Laravel CRUD App</title>
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
        <div class="container mt-5">
            <h1 class="mb-4 text-center">Tambah Kategori Buku</h1>

            <form id="addCategoryForm" class="form-card">
                @csrf

                <!-- Nama Kategori -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <!-- Tombol Simpan -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </div>

                <!-- Feedback -->
                <div id="responseMessage" class="mt-3"></div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Handle form submission with AJAX
            $('#addCategoryForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                let formData = $(this).serialize(); // Serialize form data

                // AJAX request
                $.ajax({
                    url: "{{ route('categories.store') }}", // Endpoint to store category
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        $('#responseMessage').html(
                            `<div class="alert alert-success">${response.message}</div>`
                        );
                        $('#addCategoryForm')[0].reset(); // Reset form fields
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
