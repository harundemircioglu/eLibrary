@extends('adminlte::page')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-adminlte-callout class="mt-2" id="successMsgBox" theme="success"></x-adminlte-callout>
    <!--title='Success'-->
        <!--<x-adminlte-callout class="mt-2" id="errorMsgBox" theme="danger"></x-adminlte-callout>-->
        <!--title="Danger"-->

            <x-adminlte-callout class="mt-2">
                <h3>Kullanıcı ekle</h3>

                <div class="card card-primary mt-3">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Ad">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Şifre</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Şifre">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="addUser" class="btn bg-gradient-warning">EKLE</button>
                        </div>
                    </form>
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
                                    <input type="text" class="form-control" id="editPassword" name="editPassword"
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
                                <button type="button" id="deleteUser" class="btn btn-block bg-gradient-danger">SİL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <x-adminlte-callout class="mt-2">
                <h3>Tüm kullanıcılar</h3>

                <!--  1) KULLANICILAR ARASINDA FİLTRELEME YAPILACAK-->
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
            </x-adminlte-callout>
        @endsection

        @section('css')
            <style>
                .userDetailArea {
                    width: 100%;
                    height: 100vh;
                    background-color: rgba(0, 0, 0, .6);
                    position: fixed;
                    top: 0px;
                    left: 0px;
                    z-index: 999;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .closeBtnArea {
                    width: 100%;
                    height: 60px;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                }

                .closeBtn {
                    width: 40px;
                    height: 40px;
                    border-radius: 100%;
                    background-color: rgba(0, 0, 0, .6);
                    float: right;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: white;
                    cursor: pointer;
                    transition: 0.3s ease-in-out;
                }

                .closeBtn:hover {
                    background-color: rgba(0, 0, 0, .8);
                }
            </style>
        @stop

        @section('js')
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"
                integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


            <script>
                //HIDE SUCCESS MSG AREA
                $('#successMsgBox').hide();

                //USER DETAIL AREA HİDE
                $('.userDetailArea').hide();

                //EDIT USER AREA HİDE
                $('.editUser').hide();

                //DELETE USER AREA HİDE
                $('.deleteUser').hide();




                //CLOSE BTN
                $('.closeBtn').click(function(e) {
                    e.preventDefault();

                    $('.userDetailArea').fadeOut();
                    $('.editUser').fadeOut();
                    $('.deleteUser').fadeOut();

                });




                //ADD USER
                $('#addUser').click(function(e) {
                    e.preventDefault();

                    //CSRF TOKEN
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var user = {
                        'name': $('#name').val(),
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "{{ route('addUser') }}",
                        data: user,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                                    2000);
                            }
                        }
                    });

                });
                //ADD USER END








                //EDIT USER SHOW AREA SHOW
                $('.editBtn').click(function(e) {
                    e.preventDefault();

                    var user_id = $(this).val();

                    $('.userDetailArea').fadeIn();
                    $('.editUser').show();

                    $.ajax({
                        type: "GET",
                        url: "/user_detail/" + user_id,
                        dataType: "json",
                        success: function(response) {
                            $('#edit_id').val(response.user.id);
                            $('#editName').val(response.user.name);
                            $('#editEmail').val(response.user.email);
                        }
                    });


                });
                //EDIT USER SHOW AREA END



                //UPDATE USER
                $('#updateUser').click(function(e) {
                    e.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var user_id = $('#edit_id').val();

                    var user={
                        'name': $('#editName').val(),
                        'email': $('#editEmail').val(),
                        'password': $('#editPassword').val(),
                    }

                    $.ajax({
                        type: "POST",
                        url: "/update_user/" + user_id,
                        data: user,
                        dataType: "json",
                        success: function(response) {
                            console.log(response.success);
                        }
                    });

                });
                //UPDATE USER END








                //DELETE USER SHOW
                $('.deleteBtn').click(function(e) {
                    e.preventDefault();

                    var user_id = $(this).val();

                    $('.userDetailArea').fadeIn();
                    $('.deleteUser').show();


                    $.ajax({
                        type: "GET",
                        url: "/delete_user_show/" + user_id,
                        dataType: "json",
                        success: function(response) {
                            $('#delete_id').val(response.user.id);
                            $('#deleteName').val(response.user.name);
                            $('#deleteEmail').val(response.user.email);
                        }
                    });
                });
                //DELETE USER SHOW END




                //DELETE USER OK AREA
                $('#deleteUser').click(function(e) {
                    e.preventDefault();

                    var user_id = $('#delete_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/delete_user/" + user_id,
                        dataType: "json",
                        success: function(response) {
                            //SUCCESS MESSAGE
                            $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                                2000);

                            //USER DETAIL AREA HİDE
                            $('.userDetailArea').hide();

                            //EDIT USER AREA HİDE
                            $('.editUser').hide();

                            //DELETE USER AREA HİDE
                            $('.deleteUser').hide();
                        }
                    });

                });
                //DELETE USER OK AREA END



            </script>
        @stop
