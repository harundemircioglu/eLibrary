<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kütüphane detay</title>
    <link rel="stylesheet" href="/css/deleteBookInLibrary.css">
</head>

<body>
    @include('navbar')

    <div class="container">
        @if ($booksInLibrary->isEmpty())
            <h6 class="mt-3">Kütüphaneniz boş durumda.</h6>
        @else
            <form>
                <div class="main-book-area mt-3">
                    @foreach ($booksInLibrary as $book)
                        <div class="book-area">
                            <div class="delete-book-btn-area">
                                <button type="button" value="{{ $book->book->id }}" class="book_id deleteBookButton">
                                    <img src="/img/delete.png" alt="0">
                                </button>
                            </div>
                            <div class="book-detail-area mt-1">
                                <img src="{{ Storage::url($book->book->book_image_url) }}"
                                    alt="{{ $book->book->book_name }}">
                            </div>
                            <div class="read-book-area mb-2">
                                <a href="{{ route('bookDetails', [$book->book->id]) }}">Oku</a>
                            </div>
                            <input type="hidden" value="{{ $book->library->id }}" id="library_id">
                        </div>
                    @endforeach
                </div>
            </form>
        @endif

    </div>

    <div class="delete-book-container">
        <div class="delete-book-area">
            <form>
                <div class="alert alert-success mt-1" role="alert">

                </div>
                <div class="close-btn-area mt-2 mb-1">
                    <button type="button" class="closeBookBtn">X</button>
                </div>
                <div class="book-name-area bookName"></div>
                <div class="question-area mt-1 mb-1">Kitap silinsin mi?</div>
                <div class="select-btn-area mt-1 mb-2">
                    <div class="delete-book">
                        <button type="button" class="delete-book-btn deleteBook">Sil</button>
                    </div>
                    <div class="close-book">
                        <button type="button" class="close-book-btn closeBook">Kapat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/deleteBookInLibrary.js"></script>

</body>

</html>
