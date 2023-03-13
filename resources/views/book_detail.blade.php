<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->kitap_adi }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('navbar')
    <style>
        .bookDetailArea {
            background-color: #e3f2fd;
            width: 350px;
            height: auto;
            border-radius: 10px;
            margin-left: 30px;
            padding: 10px 10px;
        }

        table {
            width: 300px;
            height: auto;
        }

        .addLibraryArea {
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0px;
            left: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .addLibraryForm {
            width: 300px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: flex-start;
            background-color: white;
            border-radius: 10px;
            padding-left: 10px;
            padding-bottom: 10px;
        }

        .closeBtnArea {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .close {
            border-radius: 100% !important;
        }

        .btn-close {
            margin-right: 10px;
            margin-top: 10px;
        }
        .msgArea{
            width: 30%;
            height: auto;
            float: right;
            margin-right: 30px;
        }
    </style>

    <div class="msgArea mt-5">
          <div class="alert alert-success alert-dismissible">
            <h5><i class="icon fas fa-check"></i></h5>
            <p class="msg"></p>
          </div>
    </div>

    <div class="bookDetailArea mt-5 text-start">
        <div class="row">
            <div class="col-md-6 text-start"><b>Kitap adı</b></div>
            <div class="col-md-6">
                <p>{{ $book->kitap_adi }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-start"><b>Kitap türü</b></div>
            <div class="col-md-6">
                <p>{{ $book->kitap_turu }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-start"><b>Yazar adı</b></div>
            <div class="col-md-6">
                <p>{{ $book->yazar_adi }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-start"><b>Yayın evi</b></div>
            <div class="col-md-6">
                <p>{{ $book->yayin_evi }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-start"><b>Yayınlanma tarihi</b></div>
            <div class="col-md-6">
                <p>{{ $book->yayinlanma_tarihi }}</p>
            </div>
        </div>

        @if ($user == '')
            <h5>Kitabı kütüphanenize eklemeniz için giriş yapmanız veya üye olmanız gerekmektedir.</h5>
        @else
            <button type="button" id="addLibraryBtn" class="btn btn-light">Kütüphaneye ekle</button>
            <div class="addLibraryArea">
                <form class="addLibraryForm">
                    <div class="closeBtnArea">
                        <button type="button" class="btn-close closeBtn" aria-label="Close"></button>
                    </div>
                    <!--USER ID-->
                    <div class="form-group">
                        <input id="user_id" name="user_id" type="hidden" class="form-control" disabled
                            value="{{ $user->id }}">
                    </div>
                    <!--BOOK ID-->
                    <div class="form-group">
                        <input id="book_id" name="book_id" type="hidden" class="form-control" disabled
                            value="{{ $book->id }}">
                    </div>
                    <div class="form-group">
                        <label for="kitapAdi">Kitap adı</label>
                        <input id="kitapAdi" type="text" class="form-control" disabled value="{{ $book->kitap_adi }}">
                    </div>
                    <!--LIBRARY ID-->
                    <div class="form-group">
                        <label for="library_id">Kütüphane seçiniz</label>
                        <select name="library_id" id="library_id" class="form-control">
                            @foreach ($user->libraries as $library)
                                <option value="{{ $library->id }}">{{ $library->kutuphane_adi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="addLibrary" type="button" class="btn btn-success">Ekle</button>
                </form>
            </div>
        @endif


    </div>

    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>

        //SAYFA YÜKLENDİĞİNDE KÜTÜPHANEYE EKLEME ALANI GİZLİ
        $('.msgArea').hide();


        //SAYFA YÜKLENDİĞİNDE KÜTÜPHANEYE EKLEME ALANI GİZLİ
        $('.addLibraryArea').hide();

        //BUTONA TIKLANDIĞINDA KÜTÜPHANEYE EKLEME ALANI AKTİF
        $('#addLibraryBtn').click(function(e) {
            e.preventDefault();

            $('.addLibraryArea').fadeIn();
        });

        //BUTONA TIKLANDIĞINDA KÜTÜPHANEYE EKLE ALANI PASİF
        $('.closeBtn').click(function(e) {
            e.preventDefault();

            $('.addLibraryArea').fadeOut();
        });

        //KÜTÜPHANEYE EKLE
        $('#addLibrary').click(function(e) {
            e.preventDefault();

            var data = {
                'user_id': $('#user_id').val(),
                'library_id': $('#library_id').val(),
                'book_id': $('#book_id').val(),
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('addUserLibraryBook') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response.success);
                    $('.addLibraryArea').fadeOut();
                    $('.msgArea').fadeIn().delay(3000).fadeOut();
                    $('.msg').text(response.success);
                }
            });

        });
    </script>

</body>

</html>
