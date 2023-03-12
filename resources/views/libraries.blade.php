<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Libraries</title>
</head>

<body>
    <style>
        .library{
            float: left;
        }
        .form{
            margin: 10px;
        }
    </style>
    @include('navbar')

    <form class="form" method="POST" action="{{route('addLibrary')}}">
        @csrf
        <div class="form-group">
            <input id="newLibrary" type="text" name="kutuphane_adi" class="form-control col-md-2" placeholder="Kütüphane adı">
        </div>
        <div class="form-group">
            <button id="addLibraryBtn" class="btn btn-success">Ekle</button>
        </div>
    </form>


    @foreach ($user->libraries as $library)
    <div class="col-lg-2 col-6 mt-3 library">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h4>{{ $library->kutuphane_adi }}</h4>
                <p>Kütüphanesi</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('libraryDetails',[$library->id])}}" class="small-box-footer">Kütüphane detayı <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endforeach
</body>

</html>
