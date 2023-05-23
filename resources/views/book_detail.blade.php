<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $book->book_name }} adlı kitaptasınız</title>
    <link rel="icon" href="/img/library.png">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    @include('navbar')
    <link rel="stylesheet" href="/css/bookDetails.css">
    <div class="container">

        <div class="row">

            <div class="col-md-8 mt-5">
                <div class="book-detail-area">
                    <form>
                        <div class="row">
                            <div class="book-image-area">
                                <img src="{{ Storage::url($book->book_image_url) }}" alt="{{ $book->book_name }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="book-info-area">
                                <div class="book-info addClass mt-1 mb-1">
                                    <h6>KİTAP ADI</h6>
                                    <h6>{{ $book->book_name }}</h6>
                                </div>
                                <div class="book-info mt-1 mb-1">
                                    <h6>KATEGORİ</h6>
                                    <h6>{{ $book->category_name }}</h6>
                                </div>
                                <div class="book-info addClass mt-1 mb-1">
                                    <h6>YAZAR ADI</h6>
                                    <h6>{{ $book->author_name }}</h6>
                                </div>
                                <div class="book-info mt-1 mb-1">
                                    <h6>YAYINLANMA TARİHİ</h6>
                                    <h6>{{ $book->publication_year }}</h6>
                                </div>
                                <div class="book-info mt-1 mb-1">
                                    @auth
                                        <button type="button" class="addLibraryBtn" value="{{ $book->id }}">Kütüphaneye
                                            ekle</button>
                                    @endauth
                                </div>
                            </div>
                        </div>

                        @auth
                            <div class="add-library-area" id="addLibraryArea">
                                <div class="add-library-container">
                                    <div class="alert alert-success mt-3" role="alert">
                                        This is a success alert—check it out!
                                    </div>
                                    <div class="add-library-container-close-btn-area mt-2 mb-2">
                                        <button type="button" class="add-library-close-btn" id="closeBtn">X</button>
                                    </div>
                                    <div class="select-library-header-area mt-1 mb-1">
                                        <h6>Kütüphane seçiniz</h6>
                                    </div>
                                    <div class="select-library-area mt-1 mb-1">
                                        <select name="library_id" class="library_id">
                                            @foreach ($libraries as $library)
                                                <option value="{{ $library->id }}">{{ $library->library_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="add-library-btn-area mt-3 mb-3">
                                        <button name="book_id" class="addLibrary" value="{{ $book->id }}"
                                            type="button">Ekle</button>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </form>
                </div>
            </div>

            <div class="col-md-4 mt-5">
                <div class="recommended-book-area">
                    <h5 class="mb-4">Sizin için önerilenler</h5>
                    @foreach ($recommendeds as $recommended)
                        <a href="{{ route('bookDetails', [$recommended->id]) }}">
                            <div class="recommended-book-container mb-4">
                                <div class="recommended-book-image">
                                    <img src="{{ Storage::url($recommended->book_image_url) }}"
                                        alt="{{ $recommended->book_name }}">
                                </div>
                                <div class="recommended-book-header">
                                    <h6>{{ $recommended->book_name }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="populer-books-slider-area mt-5 mb-5">
                <h5 class="mt-3 mb-4">Popüler olan kitaplar</h5>
                <div class="owl-carousel owl-theme">
                    @foreach ($populerBooks as $populerBook)
                        <a href="{{ route('bookDetails', [$populerBook->id]) }}">
                            <div class="item mb-3">
                                <img src="{{ Storage::url($populerBook->book_image_url) }}"
                                    alt="{{ $populerBook->book_name }}">
                                <h6>{{ $populerBook->book_name }}</h6>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/bookDetails.js"></script>

    <script src="/js/owl.carousel.min.js"></script>

    <!--SLIDER SCRIPT-->
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
</body>

</html>
