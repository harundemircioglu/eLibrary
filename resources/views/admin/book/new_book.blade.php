<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yeni kullanıcı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/user/addUser.css">

    <style>
        .msg li {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <ul class="msg"></ul>
    <div class="new-user-form-area">
        <div class="new-user-form">
            <form enctype="multipart/form-data">
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="text" name="book_name" id="book_name" class="input-txt" placeholder="Kitap adı">
                </div>
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="text" name="category_name" id="category_name" class="input-txt"
                        placeholder="Kategori adı">
                </div>
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="text" name="author_name" id="author_name" class="input-txt" placeholder="Yazar adı">
                </div>
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="text" name="publication_year" id="publication_year" class="input-txt"
                        placeholder="Yayınlanma tarihi">
                </div>
                <label for="book_image_url" class="form-label">Resim ekleyin</label>
                <input class="form-control" name="book_image_url" id="book_image_url" type="file">
                <div class="new-user-input-area mt-2 mb-3">
                    <button id="addBookBtn" type="button" class="input-btn">Ekle</button>
                </div>
            </form>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $('#addBookBtn').click(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var formData = new FormData();
            formData.append('book_name', $('#book_name').val());
            formData.append('category_name', $('#category_name').val());
            formData.append('author_name', $('#author_name').val());
            formData.append('publication_year', $('#publication_year').val());
            formData.append('book_image_url', $('#book_image_url').prop('files')[0]);

            $.ajax({
                type: "POST",
                url: "/add-book",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 200) {
                        $('.msg').html("");
                        $('.msg').append('<li>'+response.success+'</li>');
                    } else {
                        $('.msg').html("");
                        $.each(response.errors, function (val, key) {
                             $('.msg').append('<li>'+key+'</li>');
                        });
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        });
    </script>
</body>

</html>
