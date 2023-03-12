<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoşgeldin, {{ $user->name }}</title>
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
    @include('navbar')
    <div class="profileArea">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile">
                        <form method="POST" action="{{ route('updateUser', [$user->id]) }}">
                            @csrf
                            <div class="profileTitleArea">
                                <h4>Profil bilgileri</h4>
                            </div>
                            <div class="profileDesign">
                                <div class="form-group col-md-6 mt-5">
                                    <label for="name">Ad</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="email"
                                        value="{{ $user->email }}">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <label for="password">Yeni şifre</label>
                                    <input class="form-control" id="password" name="password" type="password">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <button class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="library">
                        <div class="myLibraryArea d-flex justify-content-end">
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <p>Kütüphanelerim</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ route('myLibraries', [$user->id]) }}" class="small-box-footer">Detay <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
