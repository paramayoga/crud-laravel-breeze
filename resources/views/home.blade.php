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
                            <h1 class="h3 mb-0">{{ __('Selamat Datang di Aplikasi Manajemen Buku') }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg mx-2">
                        Kelola Kategori Buku
                    </a><br>
                    <a href="{{ route('books.index') }}" class="btn btn-success btn-lg mx-2">
                        Kelola Buku
                    </a>
                </div>

                <div class="alert alert-info text-center">
                    <p>{{ __('Aplikasi Manajemen Buku ini memungkinkan Anda untuk mengelola kategori dan buku dengan mudah.') }}</p>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header text-center">{{ __('Dashboard') }}</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>{{ __('You are logged in!') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header text-center">{{ __('Dashboard') }}</div>

            <div class="card-body text-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4>{{ __('You are logged in!') }}</h4>
            </div>
        </div>
    </div>
</body>
</html>

