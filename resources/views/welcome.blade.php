<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anasayfa</title>
</head>

<body>
    @include('navbar')
    <style>
        .bookArea {
            width: 200px;
            height: 200px;
            background-color: #D5D1D1;
            border-radius: 10px;
            margin: 0px 0px 0px 20px;
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s ease-in-out;
        }

        .bookArea:hover {
            background-color: #BDBDBD;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, .3)
        }

        a {
            color: black;
        }

        .paginateArea {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
    </style>

    <!--KİTAPLARIN KAPAK RESİMLERİ DE GELECEK-->
    <div class="container mt-5">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-3 mb-5">
                    <a href="{{ route('bookDetail', [$book->id]) }}">
                        <div class="bookArea">
                            {{ $book->kitap_adi }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="paginateArea">{{ $books->links() }}</div>
    </div>

</body>

</html>
