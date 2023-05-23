<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kitaplar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/user/allUser.css">

    <style>
        .pagination {
            display: inline-block;
        }

        .pagination li {
            display: inline;
            margin-right: 5px;
        }

        .pagination li a,
        .pagination li span {
            color: #333;
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .pagination li.active a {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }

        .pagination li.disabled a,
        .pagination li.disabled span {
            color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="users-area">
        <form>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="search-user-area mb-5">
                        <input type="text" class="search-user" placeholder="Kitap arayın">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 header-item">ID</div>
                <div class="col-md-2 header-item">Kitap adı</div>
                <div class="col-md-2 header-item">Kategori adı</div>
                <div class="col-md-2 header-item">Yazar adı</div>
                <div class="col-md-1 header-item">Basım yılı</div>
                <div class="col-md-2 header-item">Kapak resmi</div>
                <div class="col-md-1 header-item">Düzenle</div>
                <div class="col-md-1 header-item">Sil</div>
            </div>

            <div class="user-area mt-4">
                <div class="all-book">
                    @foreach ($books as $book)
                        <div class="user mt-2">
                            <div class="row">
                                <div class="col-md-1 mt-1">{{ $book->id }}</div>
                                <div class="col-md-2 mt-1">{{ $book->book_name }}</div>
                                <div class="col-md-2 mt-1">{{ $book->category_name }}</div>
                                <div class="col-md-2 mt-1">{{ $book->author_name }}</div>
                                <div class="col-md-1 mt-1">{{ $book->publication_year }}</div>
                                <div class="col-md-2 mt-1"><img src="{{ Storage::url($book->book_image_url) }}"
                                        width="50px" height="50px" alt=""></div>
                                <div class="col-md-1 mt-1">
                                    <button type="button" class="edit-btn editUser"
                                        value="{{ $book->id }}">Düzenle</button>
                                </div>
                                <div class="col-md-1 mt-1">
                                    <button type="button" class="delete-btn deleteUser"
                                        value="{{ $book->id }}">Sil</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="searched-book mt-2">

                </div>
            </div>
        </form>

        <div class="pagination">
            @if ($books->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ $books->currentPage() == 1 ? ' disabled' : '' }}">
                        <a href="{{ $books->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $books->lastPage(); $i++)
                        <li class="{{ $books->currentPage() == $i ? ' active' : '' }}">
                            <a href="{{ $books->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ $books->currentPage() == $books->lastPage() ? ' disabled' : '' }}">
                        <a href="{{ $books->url($books->currentPage() + 1) }}">Next</a>
                    </li>
                    <li>
                        <a href="{{ $books->url($books->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>

    </div>



    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/admin/user/crudUser.js"></script>

    <script src="/js/admin/book/searchBook.js"></script>
</body>

</html>
