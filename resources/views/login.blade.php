<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="/css/register.css">
</head>

<body>
    <div class="main-area">
        @include('navbar')

        <div class="login-form-area">
            <div class="login-form">
                <form>
                    <div class="validation-msg-area">
                        <ul></ul>
                    </div>
                    <div class="input">
                        <p class="input-header">Giriş yap</p>
                    </div>
                    <div class="input">
                        <input type="text" name="email" id="email" class="input-txt" placeholder="E-posta">
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" class="input-txt" placeholder="Şifre">
                    </div>
                    <div class="input">
                        <button id="loginBtn" class="input-btn" type="button">Giriş yap</button>
                    </div>
                    <div class="input">
                        <div class="input-register">
                            Üye olmak için <a href="{{ route('register') }}">tıklayınız.</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="js/login.js"></script>

</body>

</html>
