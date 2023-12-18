@extends('layouts.web')
@section('isi')
<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Kelas</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Kelas Belajar- Mengajar Siswa SD Inpres 24 Ambon</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- scholarship -->
<section class="section">
  <div class="container">

    <div class="row justify-content-center">
      <!-- scholarship item -->
      @foreach ($kelas as $row)
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
          <img class="card-img-top rounded-0" src="{{asset ('file/kelas/'.$row->gambar_kelas)}}" alt="">
          <div class="card-body">
            <p class="mb-1">{!!$row->deskripsi_kelas!!}</p>
            <h4 class="card-title mb-3">{{$row->nama_kelas}}</h4>
            <ul class="list-styled">
              <li>Wali Kelas  <span class="badge badge-success">{{$row->nama_guru}}</span></li> 
              <li>Jumlah Murid  <span class="badge badge-success">{{$row->jumlah_siswa}} Orang</span></li>
              
            </ul>
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</section>
<!-- /scholarship -->
@endsection