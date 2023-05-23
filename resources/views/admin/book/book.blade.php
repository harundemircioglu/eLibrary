<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kitap işlemleri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .cover {
            width: 100%;
            height: auto;
        }

        .row {
            margin: 0px !important;
        }

        .sidebar-section {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .main-section {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-item-area {
            width: 100%;
            height: 40px;
            border-radius: 5px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .menu-item {
            width: 150px;
            height: 100%;
            background-color: #3A4750;
            border-radius: 5px;
            color: #EEEEEE;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-section iframe {
            width: 100%;
            height: 600px;
        }
    </style>
</head>

<body>

    <h5 class="mt-3">Kitap işlemleri</h5>

    <div class="cover">
        <div class="row">
            <div class="col-md-3 mt-5">
                <div class="sidebar-section">
                    <div class="menu-item-area mt-2 mb-3">
                        <a href="{{ route('newBook') }}" target="user" class="menu-item">Yeni kitap</a>
                    </div>

                    <div class="menu-item-area mt-2 mb-3">
                        <a href="{{ route('allBook') }}" target="user" class="menu-item">Kitaplar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 mt-5">
                <div class="main-section">
                    <iframe name="user" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!--SCRIPT SECTION-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
