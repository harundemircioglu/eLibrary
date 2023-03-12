<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$library->kutuphane_adi}}</title>
</head>
<body>
    @include('navbar')

    <h3>BU SAYFADA, BU KÜTÜPHANEYE AİT KİTAPLAR VE BU KÜTÜPHANENİN CRUD İŞLEMLERİ YAPILACAKTIR.</h3>
    Kütüphane adı : {{$library->kutuphane_adi}}
</body>
</html>
