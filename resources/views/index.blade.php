<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eLibrary</title>
    <link rel="icon" href="/img/library.png">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/search.css">
</head>

<body>
    <div class="main-area">
        @include('navbar')

        <div class="search-book-area mt-3">
            <div class="container">
                <div class="row searchBook">
                </div>
            </div>
        </div>

        <div class="all-book-area">

            <!--En popüler 7 kitap-->
            <div class="container">
                <h4 class="mt-3">Popüler olanlar</h4>
                <div class="owl-carousel owl-theme mt-3 mb-3 bookItem">
                    @foreach ($populerBooks as $populerBook)
                        <a href="{{ route('bookDetails', [$populerBook->id]) }}">
                            <div class="item mt-3 mb-3">
                                <div class="book-area">
                                    <div class="book-image-area">
                                        <img src="{{ Storage::url($populerBook->book_image_url) }}"
                                            alt="{{ $populerBook->book_name }}">
                                    </div>
                                </div>
                                <div class="book-header-area">
                                    <h6 class="mt-3 mb-3">{{ $populerBook->book_name }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!--Yazılımcılara özel kitaplar-->
            <div class="container mt-5">
                <h4 class="mt-3">Yazılımcılara özel</h4>
                <div class="owl-carousel owl-theme mt-3 mb-3 bookItem">
                    @foreach ($softwareBooks as $softwareBook)
                        <a href="{{ route('bookDetails', [$softwareBook->id]) }}">
                            <div class="item mt-3 mb-3">
                                <div class="book-area">
                                    <div class="book-image-area">
                                        <img src="{{ Storage::url($softwareBook->book_image_url) }}"
                                            alt="{{ $softwareBook->book_name }}">
                                    </div>
                                </div>
                                <div class="book-header-area">
                                    <h6 class="mt-3 mb-3">{{ $softwareBook->book_name }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!--Şiirsiz yapamayanlara özel kitaplar-->
            <div class="container mt-5">
                <h4 class="mt-3">Şiirsiz yapamayanlara özel</h4>
                <div class="owl-carousel owl-theme mt-3 mb-3 bookItem">
                    @foreach ($poemBooks as $poemBook)
                        <a href="{{ route('bookDetails', [$poemBook->id]) }}">
                            <div class="item mt-3 mb-3">
                                <div class="book-area">
                                    <div class="book-image-area">
                                        <img src="{{ Storage::url($poemBook->book_image_url) }}"
                                            alt="{{ $poemBook->book_name }}">
                                    </div>
                                </div>
                                <div class="book-header-area">
                                    <h6 class="mt-3 mb-3">{{ $poemBook->book_name }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!--Hikaye tutkunlarına özel kitaplar-->
            <div class="container mt-5">
                <h4 class="mt-3">Hikaye tutkunlarına özel</h4>
                <div class="owl-carousel owl-theme mt-3 mb-3 bookItem">
                    @foreach ($storyBooks as $storyBook)
                        <a href="{{ route('bookDetails', [$storyBook->id]) }}">
                            <div class="item mt-3 mb-3">
                                <div class="book-area">
                                    <div class="book-image-area">
                                        <img src="{{ Storage::url($storyBook->book_image_url) }}"
                                            alt="{{ $storyBook->book_name }}">
                                    </div>
                                </div>
                                <div class="book-header-area">
                                    <h6 class="mt-3 mb-3">{{ $storyBook->book_name }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="back-top-area">
            <div id="backToTop" class="back-top">
                <i class="fa-solid fa-angle-up" style="color: #d72323;"></i>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/index.js"></script>

    <script src="/js/owl.carousel.min.js"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 2
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
