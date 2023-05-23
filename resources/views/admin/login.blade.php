<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .main-area {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form-area {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form-area form {
            width: 400px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, .1);
            border-radius: 10px;
            background-color: #EEEEEE;
        }

        form .form-input-area {
            width: 300px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-input-area .input-txt {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            border-radius: 5px;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, .2);
            text-indent: 10px;
        }

        .form-input-area .input-btn {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            border-radius: 5px;
            background-color: #3A4750;
            color: #EEEEEE;
            transition: .3s ease-in-out;
        }

        .form-input-area .input-btn:hover {
            background-color: #303841;
        }

        .validation-area {
            width: 100%;
            height: 40px;
        }

        .validation-area ul {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
    </style>
</head>


<body>

    <div class="container">
        <div class="main-area">
            <div class="login-form-area">
                <form>
                    <div class="validation-area">
                        <ul class="validationMsg"></ul>
                    </div>
                    <div class="form-input-area mt-1">
                        <input name="email" id="email" type="text" class="input-txt" placeholder="E-posta">
                    </div>
                    <div class="form-input-area mt-3">
                        <input name="password" id="password" type="password" class="input-txt" placeholder="Şifre">
                    </div>
                    <div class="form-input-area mt-3 mb-4">
                        <button id="loginBtn" type="button" class="input-btn">Giriş</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/admin/login.js"></script>

</body>

</html>
