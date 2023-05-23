<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hoşgeldin {{ $user->name }}</title>
    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .profile-form-input-area a {
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #D72323 !important;
        }
    </style>
</head>

<body>
    <div class="main-area">
        @include('navbar')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mt-3">
                    <div class="profile-form-area">
                        <form>
                            <div class="validation-msg-area">
                                <ul class="libraryValidation"></ul>
                            </div>
                            <div class="profile-form-header-area">
                                <h6>Kütüphane işlemleri</h6>
                            </div>
                            <div class="profile-form-input-area mt-2">
                                <button id="addNewLibraryBtn" type="button" class="input-btn">Kütüphane ekle</button>
                            </div>
                        </form>
                        <div class="profile-form-input-area mt-2">
                            <a href="{{ route('myLibraries', [$user->id]) }}" class="input-btn">Kütüphanelerim</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="profile-form-area">
                        <form>
                            <div class="validation-msg-area">
                                <ul class="profileValidation"></ul>
                            </div>
                            <div class="profile-form-header-area">
                                <h6>Profil ayarları</h6>
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <input name="name" id="name" type="text" class="input-txt" placeholder="Ad"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <input name="email" id="email" type="text" class="input-txt"
                                    placeholder="E-posta" value="{{ $user->email }}">
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <input name="phone" id="phone" type="text" class="input-txt"
                                    placeholder="5XXXXXXXXX" value="{{ $user->phone }}">
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <button id="updateProfileBtn" type="button" class="input-btn">Güncelle</button>
                            </div>
                            <input name="user_id" id="update_user_id" type="hidden" value="{{ $user->id }}">
                        </form>
                    </div>
                </div>
                <div class="col-md-4 mt-3 mb-3">
                    <div class="profile-form-area">
                        <form>
                            <div class="validation-msg-area">
                                <ul class="passwordValidation"></ul>
                            </div>
                            <div class="profile-form-header-area">
                                <h6>Şifre ayarları</h6>
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <input name="password" id="password" type="password" class="input-txt"
                                    placeholder="Yeni şifre">
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <input name="rePassword" id="rePassword" type="password" class="input-txt"
                                    placeholder="Yeni şifre tekrar">
                            </div>
                            <div class="profile-form-input-area mt-4">
                                <button id="updatePasswordBtn" type="button" class="input-btn">Güncelle</button>
                            </div>
                            <input id="updatePasswordUserId" type="hidden" value="{{ $user->id }}">
                        </form>
                    </div>
                </div>
                <div id="addNewLibraryArea" class="add-new-library-area">
                    <div class="container">
                        <div class="add-library-area">
                            <form>
                                <div class="validation-msg-area">
                                    <ul class="libraryErrorValidation"></ul>
                                </div>
                                <div class="close-btn-area">
                                    <button id="closeAddLibraryBtn" type="button" class="close-btn">X</button>
                                </div>
                                <div class="profile-form-header-area mt-2">
                                    <h6>Kütüphane ekle</h6>
                                </div>
                                <div class="profile-form-input-area mt-2">
                                    <input name="library_name" id="library_name" type="text" class="input-txt"
                                        placeholder="Kütüphane adı">
                                </div>
                                <div class="profile-form-input-area mt-4">
                                    <button id="addLibraryBtn" type="button" class="input-btn">Ekle</button>
                                </div>
                                <div class="profile-form-input-area mt-2">
                                    <input name="user_id" id="user_id" type="text" class="input-txt" hidden
                                        value="{{ $user->id }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/profile.js"></script>

    <script></script>
</body>

</html>
