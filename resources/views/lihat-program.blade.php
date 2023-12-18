@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="{{asset ('web/images/backgrounds/page-title.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{url('programm')}}">Program</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">{{$program->nama_program}}</li>
        </ul>
        <p class="text-lighten">Program SD Inpres 24 Ambon Tahun Ajaran 2023 - 2024.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- section -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <!-- course thumb -->
        <img src="{{asset ('file/program/'.$program->gambar_program)}}" class="img-fluid w-100">
      </div>
    </div>
    <!-- course info -->
    <div class="row align-items-center mb-5">
      <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
        <h2>{{$program->nama_program}}</h2>
      </div>
      
      <!-- border -->
      <div class="col-12 mt-4 order-4">
        <div class="border-bottom border-primary"></div>
      </div>
    </div>
    <!-- course details -->
    <div class="row">
      <div class="col-12 mb-4">
        
        <p>{!!$program->keterangan_program!!}</p>
      </div>
      
      <!-- teacher -->
      
    </div>
  </div>
</section>
<!-- /section -->

<!-- related course -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Program Lainnya</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <!-- course item -->
      @foreach ($programm as $row)
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card p-0 border-primary rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="{{asset ('file/program/'.$row->gambar_program)}}" alt="course thumb">
          <div class="card-body">
            <!-- <ul class="list-inline mb-2">
              <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
              <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
            </ul> -->
            <a href="course-single.html">
              <h4 class="card-title">{{$row->nama_program}}</h4>
            </a>
            <p class="card-text mb-4"> {!! Str::limit($row->keterangan_program, 60, '...') !!} <a href="{{ url('lihat-program/'.$row->slug_program) }}">Baca Selengkapnya</a> </p>
            <!-- <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a> -->
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /related course -->

@endsection