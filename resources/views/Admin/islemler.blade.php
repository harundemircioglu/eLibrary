@extends('adminlte::page')

@section('content')
<div class="row mt-3">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h4>Kullanıcı işlemleri</h4>
          <p>Kullanıcılar üzerindeki tüm işlemleri buradan yönetebilirsiniz.</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('admin.kullanici_islemleri')}}" class="small-box-footer">Detay <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h4>Kitap işlemleri</h4>

          <p>Kitaplar üzerindeki tüm işlemleri buradan yönetebilirsiniz.</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{route('admin.kitap_islemleri')}}" class="small-box-footer">Detay <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
@endsection

