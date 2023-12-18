@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Program</a></li>
          <li class="list-inline-item text-white h3 font-secondary "></li>
        </ul>
        <p class="text-lighten">Program SD Inpres 24 Ambon Tahun Ajaran 2023 - 2024</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
  <div class="container">
    <!-- course list -->
    <div class="row justify-content-center">
      <!-- course item -->
      @foreach ($program as $row)
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
    <!-- /course list -->
  </div>
</section>
<!-- /courses -->
@endsection