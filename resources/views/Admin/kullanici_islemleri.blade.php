@extends('adminlte::page')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-adminlte-callout class="mt-2" id="successMsgBox" theme="success"></x-adminlte-callout>
    <!--title='Success'-->
        <!--<x-adminlte-callout class="mt-2" id="errorMsgBox" theme="danger"></x-adminlte-callout>-->
        <!--title="Danger"-->

            <x-adminlte-callout class="mt-2">
                <h3>Kullanıcı ekle</h3>

                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ad</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Ad">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Şifre</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Şifre">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-footer col-md-12">
                                        <button type="button" id="addUser" class="btn bg-gradient-warning">EKLE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </x-adminlte-callout>


            <div class="userDetailArea">
                <div class="editUser">
                    <div class="card card-primary mt-3">
                        <form>
                            <div class="card-body">
                                <div class="closeBtnArea">
                                    <div class="closeBtn">X</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID</label>
                                    <input type="text" id="edit_id" name="id" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ad</label>
                                    <input type="text" id="editName" name="editName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="editEmail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Şifre</label>
                                    <input type="password" class="form-control" id="editPassword" name="editPassword"
                                        placeholder="Yeni şifre">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="updateUser"
                                    class="btn btn-block bg-gradient-success">KAYDET</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="deleteUser">
                    <div class="card card-primary mt-3">
                        <form>
                            <div class="card-body">
                                <div class="closeBtnArea">
                                    <div class="closeBtn">X</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID</label>
                                    <input type="text" id="delete_id" name="id" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ad</label>
                                    <input type="text" id="deleteName" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="deleteEmail" name="email">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="deleteUser"
                                    class="btn btn-block bg-gradient-danger">SİL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <x-adminlte-callout class="mt-2">
                <h3>Tüm kullanıcılar</h3>

                <!--  1) KULLANICILAR ARASINDA FİLTRELEME YAPILACAK-->
                <!-- 3) KULLANICILAR TABLO İLE SAYFA SAYFA GETİRİLECEK-->
                <!-- 2) KULLANICILAR AJAX İLE GETİRİLECEK-->
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-1">
                            <h5><b>ID</b></h5>
                        </div>
                        <div class="col-md-1">
                            <h5><b>AD</b></h5>
                        </div>
                        <div class="col-md-3">
                            <h5><b>EMAIL</b></h5>
                        </div>
                        <div class="col-md-1">
                            <h5><b>DÜZENLE</b></h5>
                        </div>
                        <div class="col-md-1">
                            <h5><b>SİL</b></h5>
                        </div>
                    </div>
                    @foreach ($users as $user)
                        <div class="row mt-1">
                            <div class="col-md-1">{{ $user->id }}</div>
                            <div class="col-md-1">{{ $user->name }}</div>
                            <div class="col-md-3">{{ $user->email }}</div>
                            <div class="col-md-1"><button type="button"
                                    class="editBtn btn btn-block btn-outline-warning"
                                    value="{{ $user->id }}">Düzenle</button></div>
                            <div class="col-md-1"><button type="button"
                                    class="deleteBtn btn btn-block btn-outline-danger"
                                    value="{{ $user->id }}">Sil</button></div>
                        </div>
                    @endforeach
                </div>
                {{ $users->links() }}
            </x-adminlte-callout>
        @endsection

        @section('css')
            <link rel="stylesheet" href="/css/kullanici_islemleri.css">
        @stop

        @section('js')
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"
                integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


            <script src="/js/kullanici_islemleri.js">

            </script>
        @stop
