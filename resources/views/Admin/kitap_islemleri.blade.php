@extends('adminlte::page')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-adminlte-callout class="mt-2" id="successMsgBox" theme="success"></x-adminlte-callout>
    <!--title='Success'-->
        <!--<x-adminlte-callout class="mt-2" id="errorMsgBox" theme="danger"></x-adminlte-callout>-->
        <!--title="Danger"-->

            <x-adminlte-callout class="mt-2">
                <h3>Kitap ekle</h3>

                <div class="card">
                    <div class="container">
                        <!--START CONTAINER-->
                        <form enctype="multipart/form-data">

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div>
                                        <label for="exampleInputEmail1">Kitap adı</label>
                                        <input type="text" id="kitap_adi" name="kitap_adi" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="exampleInputEmail1">Kitap türü</label>
                                        <input type="text" id="kitap_turu" name="kitap_turu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="exampleInputPassword1">Yazar adı</label>
                                        <input type="text" id="yazar_adi" name="yazar_adi" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div>
                                        <label for="exampleInputPassword1">Yayın evi</label>
                                        <input type="text" id="yayin_evi" name="yayin_evi" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="exampleInputPassword1">Yayınlanma tarihi</label>
                                        <input type="text" id="yayinlanma_tarihi" name="yayinlanma_tarihi"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="formFileMultiple" class="form-label">Kitap resmi</label>
                                        <input class="form-control" type="file" id="kapak_resmi" name="kapak_resmi">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5 mt-2">
                                <div class="col-md-12">
                                    <div class="card-footer">
                                        <button type="button" id="addBook" class="btn bg-gradient-warning">EKLE</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!--END CONTAINER-->

                </div>

            </x-adminlte-callout>

            <x-adminlte-callout class="mt-2">

                <h3>Tüm kitaplar</h3>

                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <form>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6><b>KİTAP ADI</b></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6><b>YAZAR ADI</b></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6><b>DÜZENLE</b></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6><b>SİL</b></h6>
                                    </div>
                                </div>
                                <!-- 1) KİTAPLAR SAYFALAR HALİNDE GETİRİLECEK-->
                                <div class="row books mt-3">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </x-adminlte-callout>


            <!--EDIT BOOK AREA-->

            <div class="bookDetailArea">
                <div class="editBookArea">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <!--START CONTAINER-->
                                <form enctype="multipart/form-data">

                                    <div class="closeBtnArea">
                                        <div class="closeBtn">X</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="exampleInputEmail1">ID</label>
                                                <input type="text" id="edit_id" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div>
                                                <label for="exampleInputEmail1">Kitap adı</label>
                                                <input type="text" id="edit_kitap_adi" name="kitap_adi"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="exampleInputEmail1">Kitap türü</label>
                                                <input type="text" id="edit_kitap_turu" name="kitap_turu"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="exampleInputPassword1">Yazar adı</label>
                                                <input type="text" id="edit_yazar_adi" name="yazar_adi"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="exampleInputPassword1">Yayın evi</label>
                                                <input type="text" id="edit_yayin_evi" name="yayin_evi"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="exampleInputPassword1">Yayınlanma tarihi</label>
                                                <input type="text" id="edit_yayinlanma_tarihi"
                                                    name="yayinlanma_tarihi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="formFileMultiple" class="form-label">Kitap resmi</label>
                                                <input class="form-control" type="file" id="kapak_resmi"
                                                    name="kapak_resmi">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5 mt-2">
                                        <div class="col-md-12">
                                            <div class="card-footer">
                                                <button type="button" id="updateBook"
                                                    class="btn btn-block bg-gradient-success col-md-4">KAYDET</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <!--END CONTAINER-->
                        </div>
                    </div>
                </div>

                <div class="deleteBookArea">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <!--START CONTAINER-->
                                <div class="closeBtnArea">
                                    <div class="closeBtn">X</div>
                                </div>
                                <form enctype="multipart/form-data">

                                    <div class="row">
                                        <div>
                                            <div>
                                                <label for="exampleInputEmail1">ID</label>
                                                <input type="text" id="delete_id" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div>
                                            <div>
                                                <label for="exampleInputEmail1">Kitap adı</label>
                                                <input type="text" id="delete_kitap_adi" name="kitap_adi"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5 mt-2">
                                        <div class="col-md-12">
                                            <div class="card-footer">
                                                <button type="button" id="deleteBook"
                                                    class="btn btn-block bg-gradient-danger">SİL</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <!--END CONTAINER-->
                        </div>
                    </div>
                </div>
            </div>



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

                .bookDetailArea {
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
            </style>
        @stop

        @section('js')
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"
                integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


            <script>
                //HIDE SUCCESS MSG AREA
                $('#successMsgBox').hide();

                //HIDE BOOK DETAIL AREA
                $('.bookDetailArea').hide();

                //HIDE EDIT BOOK AREA
                $('.editBookArea').hide();

                //HIDE DELETE BOOK AREA
                $('.deleteBookArea').hide();


                //CLOSE BTN
                $('.closeBtn').click(function(e) {
                    e.preventDefault();

                    $('.bookDetailArea').fadeOut();
                    $('.editBookArea').fadeOut();
                    $('.deleteBookArea').fadeOut();

                });



                //ADD NEW BOOK
                $('#addBook').click(function(e) {
                    e.preventDefault();

                    var book = {
                        'kitap_adi': $('#kitap_adi').val(),
                        'kitap_turu': $('#kitap_turu').val(),
                        'yazar_adi': $('#yazar_adi').val(),
                        'yayin_evi': $('#yayin_evi').val(),
                        'yayinlanma_tarihi': $('#yayinlanma_tarihi').val(),
                        //EN SON EKLENECEK//'kapak_resmi': $('#kapak_resmi').val()
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('addBook') }}",
                        data: book,
                        dataType: "json",
                        success: function(response) {
                            $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                                2000);

                            //KİTAP EKLENDİKTEN SONRA FONKSİYON ÇALIŞACAK
                            //VE KİTABIN EKLENDİĞİ ANLIK OLARAK GÖRÜLECEK
                            allBook();
                        }
                    });

                });
                //ADD NEW BOOK END


                //SHOW ALL BOOK
                function allBook() {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('allBook') }}",
                        dataType: "json",
                        success: function(response) {

                            $('.books').html("");
                            $.each(response.books, function(val, key) {
                                $('.books').append('<div class="col-md-3 mt-2">' + key.kitap_adi +
                                    '</div>\
                                                                                                                                                                                                                        <div class="col-md-3 mt-2">' +
                                    key
                                    .yazar_adi +
                                    '</div>\
                                                                                                                                                                                                                        <div class="col-md-3 mt-2"><button type="button" value="' +
                                    key.id +
                                    '" class="editBook btn btn-block btn-outline-warning">DÜZENLE</button></div>\
                                                                                                                                                                                                                        <div class="col-md-3 mt-2"><button type="button" value="' +
                                    key.id +
                                    '" class="deleteBook btn btn-block btn-outline-danger">SİL</button></div>\
                                                                                                                                                           '
                                );
                            });
                        }
                    });
                };
                //SHOW ALL BOOK END




                //EDIT BOOK SHOW
                $(document).on('click', '.editBook', function() {
                    var book_id = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "/showEditBook/" + book_id,
                        dataType: "json",
                        success: function(response) {
                            var edit_book_id = response.book.id;

                            $('#edit_id').val(response.book.id);
                            $('#edit_kitap_adi').val(response.book.kitap_adi);
                            $('#edit_kitap_turu').val(response.book.kitap_turu);
                            $('#edit_yazar_adi').val(response.book.yazar_adi);
                            $('#edit_yayin_evi').val(response.book.yayin_evi);
                            $('#edit_yayinlanma_tarihi').val(response.book.yayinlanma_tarihi);

                            $('.bookDetailArea').fadeIn();

                            $('.editBookArea').show();
                        }
                    });

                });
                //EDIT BOOK SHOW END





                //UPDATE BOOK
                $('#updateBook').click(function(e) {
                    e.preventDefault();

                    var book_id = $('#edit_id').val();

                    var book = {
                        'kitap_adi': $('#edit_kitap_adi').val(),
                        'kitap_turu': $('#edit_kitap_turu').val(),
                        'yazar_adi': $('#edit_yazar_adi').val(),
                        'yayin_evi': $('#edit_yayin_evi').val(),
                        'yayinlanma_tarihi': $('#edit_yayinlanma_tarihi').val()
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/updateBook/" + book_id,
                        data: book,
                        dataType: "json",
                        success: function(response) {
                            $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                                2000);

                            $('.bookDetailArea').fadeOut();
                            $('.editBookArea').fadeOut();
                        }
                    });

                    allBook();

                });
                //UPDATE BOOK END





                //DELETE BOOK SHOW
                $(document).on('click', '.deleteBook', function() {

                    var book_id = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "/showDeleteBook/" + book_id,
                        dataType: "json",
                        success: function(response) {
                            $('#delete_id').val(response.book.id);
                            $('#delete_kitap_adi').val(response.book.kitap_adi);

                            $('.bookDetailArea').fadeIn();
                            $('.deleteBookArea').fadeIn();
                        }
                    });
                });
                //DELETE BOOK SHOW END



                //DELETE BOOK
                $('#deleteBook').click(function(e) {
                    e.preventDefault();

                    var book_id = $('#delete_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/deleteBook/" + book_id,
                        dataType: "json",
                        success: function(response) {
                            $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                                2000);

                            $('.bookDetailArea').fadeOut();
                            $('.deleteBookArea').fadeOut();
                        }
                    });

                    allBook();

                });
                //DELETE BOOK END

                allBook();
            </script>
        @stop
