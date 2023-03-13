@extends('adminlte::page')
@section('content')
<h5>BU SAYFA <b>çalışmamaktadır!</b> Sadece tasarlandı.</h5>
    <form>
        <div class="form-group col-3">
            <label class="mt-3" for="password">Güncel şifre</label>
            <input id="password" type="password" class="form-control">
        </div>
        <div class="form-group col-3">
            <label class="mt-1" for="password">Yeni şifre</label>
            <input id="newPassword" type="password" class="form-control">
        </div>
        <div class="form-group col-3">
            <label class="mt-1" for="password">Yeni şifre tekrar</label>
            <input id="newPasswordRepeat" type="password" class="form-control">
        </div>
        <div class="form-group col-3">
            <button type="button" class="btn btn-outline-success mt-3">Kaydet</button>
        </div>
    </form>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>

    </script>
@endsection
