<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/admin/navbar.css">

    <link rel="stylesheet" href="/css/admin/home.css">
</head>

<body>
    @include('admin.navbar')

    <div class="main-area">
        <div class="menu-area">
            <div class="container">
                <div class="row" id="menu">
                    <div class="col-md-4 menu-item-area mt-2 mb-3">
                        <div class="menu-item">
                            <a id="user" target="frame" href="{{ route('user') }}" class="item">Kullanıcı
                                işlemleri</a>
                        </div>
                    </div>
                    <div class="col-md-4 menu-item-area mt-2 mb-3">
                        <div class="menu-item">
                            <a id="book" target="frame" href="{{ route('book') }}" class="item">Kitap
                                işlemleri</a>
                        </div>
                    </div>
                    <div class="col-md-4 menu-item-area mt-2 mb-3">
                        <div class="menu-item">
                            <a id="profile" target="frame" href="{{ route('admin.profile') }}" class="item">Profil
                                işlemleri</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="frame-area mt-3">
                        <iframe name="frame"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $('#menu').hide();
        $('#menuControlItem').click(function() {
            $('#menu').slideToggle();
            setTimeout(function() {
                $('#menu').slideUp();
            }, 3000);
        });
    </script>
</body>

</html>
