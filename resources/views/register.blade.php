<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Üye ol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <style>

    </style>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Üye ol</h3>
                                </div>
                            </div>
                            <form class="signin-form" method="POST" action="{{route('userRegister')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ad</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ad" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Şifre</label>
                                    <input type="password" name="password" class="form-control" placeholder="Şifre"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button class="form-control btn btn-primary submit px-3">Üye
                                        ol</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Beni hatırla
                                            <input type="checkbox" checked="">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Üye ol sayfasına hoşgeldiniz.</h2>
                                <p>Hesabınız var mı?</p>
                                <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Giriş yap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--SCRIPT SECTION-->
    <script src="/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
