<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Libraries</title>
    <link rel="stylesheet" href="/css/library.css">
</head>

<body>
    @include('navbar')
    <div class="container">
        <div class="libraries-area">

            <!--SET EDİLİP EDİLMEDİĞİNE GÖRE KODLAR DEVAM EDİYOR-->
            @if (isset($librariesWithBookCount) && $librariesWithBookCount->count() > 0)
                <!--SET EDİLMİŞSE (KÜTÜPHANEDE KİTAP VARSA) BU KODLAR ÇALIŞACAK-->
                @foreach ($librariesWithBookCount as $library)
                    <div class="library-container mt-4 mb-3">
                        <div class="library-header-area">
                            <div class="library-header">{{ $library->library_name }}</div>
                            <div class="edit-library-area">
                                <form>
                                    <button type="button" value="{{ $library->id }}"
                                        class="edit-library-background editLibraryBtn">
                                        <img src="/img/pencil.png" alt="">
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="library-body-area">
                            @if ($library->books_in_libraries_count < 1 /*== 0' da kullanılabilir*/)
                                <p>Kütüphanede kitap bulunmamaktadır.</p>
                            @else
                                <p>Kütüphanede {{ $library->books_in_libraries_count }} adet kitap bulunmaktadır.</p>
                            @endif
                        </div>
                        <div class="library-detail-area">
                            <a href="{{ route('libraryDetails', [$library->id]) }}">Detay</a>
                        </div>
                    </div>
                @endforeach
            @else
                <!--SET EDİLMEMİŞSE (KÜTÜPHANEDE KİTAP YOKSA) BU KODLAR ÇALIŞACAK-->
                <p>Kullanıcının kütüphanesi bulunamadı.</p>
            @endif






            <div class="update-library-area updateLibraryArea">
                <div class="update-library-form-area">
                    <form>
                        <input name="user_id" class="userId" type="hidden">
                        <div class="close-btn-area mt-3">
                            <button type="button" class="close-btn closeBtn">X</button>
                        </div>
                        <div class="update-library-input-area mt-3">
                            <input name="library_name" class="input-txt library_name" type="text">
                        </div>
                        <div class="update-library-input-area mt-4 mb-4">
                            <button type="button" class="input-btn saveLibraryBtn">Kaydet</button>
                        </div>
                        <div class="update-library-input-area mb-4">
                            <button type="button" class="delete-btn showDeleteLibraryArea">Sil</button>
                        </div>
                        <div class="delete-library-area deleteLibraryArea">
                            <div class="delete-library-form-area">
                                <div class="close-delete-btn-area mt-3">
                                    <button type="button" class="close-btn closeDeleteArea">X</button>
                                </div>
                                <div class="delete-library-input-area mt-3">
                                    <input class="input-txt delete_library" type="text">
                                </div>
                                <div class="delete-library-input-area mt-3">
                                    <p>Kütüphane silinsin mi ?</p>
                                </div>
                                <div class="delete-library-input-area mt-1 mb-3">
                                    <button type="button" class="input-btn delete-btn deleteBtn">Sil</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/library.js"></script>
</body>

</html>
