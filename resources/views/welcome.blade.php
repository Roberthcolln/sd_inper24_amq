@extends('layouts.web')
@section('isi')

<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="web/images/banner/banner-1.jpg">
  <div class="container">

    <!-- slider item -->
    <div class="hero-slider-item">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Selamat Datang Di<br> <span class="badge badge-warning">{{$konf->instansi_setting}}</span></h2>
          <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Majukan Sekolah Di Era Digitalisasi</p>
          <a href="#layanan" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Selanjutnya</a>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- /hero slider -->

<!-- banner-feature -->
<section class="bg-gray" id="layanan">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-xl-4 col-lg-5 align-self-end">
        <img class="img-fluid w-100" src="web/images/banner/banner-feature.png" alt="banner-feature">
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">
          @foreach ($layanan as $row)
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <img src="{{asset ('file/layanan/'.$row->gambar_layanan)}}" style="width: 25%;" alt="">
            <h3 class="mb-xl-4 mb-lg-3 mb-4">{{$row->nama_layanan}}</h3>
            <p>{!!$row->keterangan_layanan!!}</p>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</section>
<!-- /banner-feature -->

<!-- courses -->


<!-- cta -->
<section class="section bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white font-secondary mb-0">Klik Daftar</h6>
        <h2 class="section-title text-white">Untuk Melakukan Pendaftaran <br> Penerimaan Siswa Baru</h2>
        <a href="#" class="btn btn-secondary">Daftar</a>
      </div>
    </div>
  </div>
</section>
<!-- /cta -->

<!-- success story -->
<section class="section bg-cover" data-background="web/images/backgrounds/success-story.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Visi dan Misi <br> <i>{{$konf->instansi_setting}}</i> </h2>
          <p>{!!$konf->visi_setting!!}</p>
          <p>{!!$konf->misi_setting!!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /success story -->

@endsection