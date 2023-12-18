@extends('layouts.web')
@section('isi')
<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Tentang Kami</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Kepala Sekolah  : {{$konf->pimpinan_setting}}</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- about -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <img class="img-fluid w-100 mb-4" src="web/images/about/about-page.jpg" alt="about image">
        <h2 class="section-title">Tentang {{$konf->instansi_setting}}</h2>
        <p>{!!$konf->tentang_setting!!}</p>
      </div>
    </div>
  </div>
</section>
<!-- /about -->

<!-- funfacts -->
<section class="section-sm bg-primary">
  <div class="container">
    <div class="row">
      <!-- funfacts item -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="{{$ticer}}">0</h2>
          <h5 class="text-white">Guru</h5>
        </div>
      </div>
      <!-- funfacts item -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="{{$siswa}}">0</h2>
          <h5 class="text-white">Siswa</h5>
        </div>
      </div>
      <!-- funfacts item -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="{{$fasilitas}}">0</h2>
          <h5 class="text-white">Fasilitas</h5>
        </div>
      </div>
      <!-- funfacts item -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="{{$layanan}}">0</h2>
          <h5 class="text-white">Layanan</h5>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /funfacts -->

<!-- success story -->
<!-- <section class="section bg-cover" data-background="web/images/backgrounds/success-story.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Success Stories</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- /success story -->

<!-- teachers -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Data Guru</h2>
      </div>
      <!-- teacher -->
      @foreach ($guru as $row)
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
          <div class="card-body">
           
              <h4 class="card-title">{{$row->nama_guru}}</h4>
            
            <p>{{$row->jabatan_guru}} {{$konf->instansi_setting}}</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="https://www.facebook.com/{{ $row->facebook_guru }}"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="https://instagram.com/{{ $row->instagram_guru }}"><i class="ti-instagram"></i></a></li>

            </ul>
          </div>
        </div>
      </div>
      @endforeach
      <!-- teacher -->
    </div>
  </div>
</section>
<!-- /teachers -->
@endsection