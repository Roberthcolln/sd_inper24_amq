@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="{{asset ('web/images/backgrounds/page-title.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{url('kegiatann')}}"> Kegiatan</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">{{$kegiatan->nama_kegiatan}}</li>
        </ul>
        <!-- <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p> -->
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- event single -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">{{$kegiatan->nama_kegiatan}}</h2>
      </div>
      <!-- event image -->
      <div class="col-12 mb-4">
        <img src="{{asset ('file/kegiatan/'.$kegiatan->gambar_kegiatan)}}" alt="event thumb" class="img-fluid w-100">
      </div>
    </div>
    <!-- event info -->

    <!-- {{$kegiatan->nama_kegiatan}} -->
    <div class="row">
      <div class="col-12 mb-50">

        <p>{!!$kegiatan->deskripsi_kegiatan!!}</p>
      </div>
    </div>
    <!-- event speakers -->

  </div>
</section>
<!-- /event single -->

<!-- more event -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">More Events</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <!-- event -->
      @foreach ($kegiatann as $row)
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="{{asset ('file/kegiatan/'.$row->gambar_kegiatan)}}" alt="event thumb">
            <div class="card-date"><span>{{ Carbon\Carbon::parse($row->tanggal_kegiatan)->isoFormat('D') }} </span><br>{{ Carbon\Carbon::parse($row->tanggal_kegiatan)->isoFormat('MMMM') }} </div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>{{$row->tempat_kegiatan}}</p>
            <a href="{{ url('lihat-kegiatan/'.$row->slug_kegiatan) }}">
              <h4 class="card-title">{{$row->nama_kegiatan}}</h4>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /more event -->

@endsection