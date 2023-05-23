<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yeni kullanıcı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/user/addUser.css">
</head>

<body>
    <div class="new-user-header-area">
        <h6>Sadece yetkili kullanıcı eklenmektedir.</h6>
    </div>
    <div class="validation-area">
        <ul></ul>
    </div>
    <div class="new-user-form-area">
        <div class="new-user-form">
            <form>
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="text" name="name" id="name" class="input-txt" placeholder="Ad">
                </div>
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="text" name="email" id="email" class="input-txt" placeholder="Email">
                </div>
                <div class="new-user-input-area mt-2 mb-3">
                    <input type="password" name="password" id="password" class="input-txt" placeholder="Şifre">
                </div>
                <div class="new-user-input-area mt-2 mb-3">
                    <button id="newUserBtn" type="button" class="input-btn">Ekle</button>
                </div>
            </form>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/admin/user/addUser.js"></script>
</body>

</html>
