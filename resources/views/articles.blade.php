<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Articles</h2>
        <button id="createArticleBtn" class="btn btn-primary">Create Article</button>
        <table class="table" id="articleTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // AJAX untuk mengambil artikel
        function fetchArticles() {
            $.ajax({
                url: "{{ route('articles.index') }}",
                method: 'GET',
                success: function(response) {
                    $('#articleTable tbody').empty();
                    response.forEach(function(article) {
                        $('#articleTable tbody').append(`
                            <tr>
                                <td>${article.title}</td>
                                <td>${article.content}</td>
                                <td>
                                    <button class="btn btn-info edit" data-id="${article.id}">Edit</button>
                                    <button class="btn btn-danger delete" data-id="${article.id}">Delete</button>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        }

        // Panggil fetchArticles saat halaman dimuat
        $(document).ready(function() {
            fetchArticles();

            // AJAX untuk create artikel
            $('#createArticleBtn').click(function() {
                $.ajax({
                    url: "{{ route('articles.store') }}",
                    method: 'POST',
                    data: {
                        title: 'New Article',
                        content: 'Content of the new article',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchArticles();
                    }
                });
            });

            // AJAX untuk delete artikel
            $('#articleTable').on('click', '.delete', function() {
                var articleId = $(this).data('id');
                $.ajax({
                    url: '/articles/' + articleId,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchArticles();
                    }
                });
            });
        });
    </script>
</body>
</html>
