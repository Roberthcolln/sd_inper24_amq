@extends('layouts.web')
@section('isi')
<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Berita</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Informasi SD Inpres 24 Ambon</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- blogs -->
<section class="section">
  <div class="container">
    <div class="row">
      <!-- blog post -->
      @foreach ($berita as $row)
      <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
          <img class="card-img-top rounded-0" src="{{asset ('file/berita/'.$row->gambar_berita)}}" alt="Post thumb">
          <div class="card-body">
            <!-- post meta -->
            <ul class="list-inline mb-3">
              <!-- post date -->
              <li class="list-inline-item mr-3 ml-0">{{ Carbon\Carbon::parse($row->tanggal_berita)->isoFormat('dddd, D MMMM Y')  }}</li>
              <!-- author -->
              <!-- <li class="list-inline-item mr-3 ml-0">By Jonathon</li> -->
            </ul>
            
              <h4 class="card-title">{{$row->judul_berita}}</h4>
            
            <p class="card-text">{!! Str::limit($row->isi_berita, 50, '...') !!}</p>
            <a href="{{ url('read/'.$row->slug_berita) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>
<!-- /blogs -->

@endsection