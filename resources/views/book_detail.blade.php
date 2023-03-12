<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->kitap_adi }}</title>
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
    </style>

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
            <button type="button" class="btn btn-light">Kütüphaneye ekle</button>
        @endif
    </div>
</body>

</html>
