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
            <link rel="stylesheet" href="/css/kitap_islemleri.css">
        @stop

        @section('js')
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"
                integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


            <script src="/js/kitap_islemleri.js"></script>
        @stop
