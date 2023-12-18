@extends('layouts.web')
@section('isi')

  <!-- page title -->
<section class="page-title-section overlay" data-background="{{asset ('web/images/backgrounds/page-title.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{url('news')}}">Berita</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">{{$baca->judul_berita}}</li>
        </ul>
        <!-- <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p> -->
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- blog details -->
<section class="section-sm bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <img src="{{asset ('file/berita/'.$baca->gambar_berita)}}" alt="blog-thumb" class="img-fluid w-100">
      </div>
      <div class="col-12">
        <ul class="list-inline">
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><span class="font-weight-bold mr-2">Post:</span>Admin</li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light">{{ Carbon\Carbon::parse($baca->tanggal_berita)->isoFormat('dddd, D MMMM Y')  }}</li>
          <!-- <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-book mr-2"></i>Read 289</li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-share mr-2"></i>289</li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><a class="text-light" href="#"><i class="ti-comments mr-2"></i>265</a></li> -->
        </ul>
      </div>
      <!-- border -->
      <div class="col-12 mt-4">
        <div class="border-bottom border-primary"></div>
      </div>
      <!-- blog contect -->
      <div class="col-12 mb-5">
        <h2>{{$baca->judul_berita}} </h2>
        <p>{!!$baca->isi_berita!!} </p>
      </div>
      <!-- comment box -->
      <div class="col-12">
        <form action="#" class="row">
          <div class="col-sm-6">
            <input type="text" class="form-control mb-4" id="name" name="name" placeholder="Full Name">
          </div>
          <div class="col-sm-6">
            <input type="email" class="form-control mb-4" id="mail" name="mail" placeholder="Email Address">
          </div>
          <div class="col-12">
            <textarea name="comment" id="comment" class="form-control mb-4" placeholder="Comment Here..."></textarea>
          </div>
          <div class="col-12">
            <button type="submit" value="send" class="btn btn-primary">post comment</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /blog details -->

<!-- recommended post -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Recommended</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  @foreach ($listberita as $row)
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
            <a href="blog-single.html">
              <h4 class="card-title">{{$row->judul_berita}}</h4>
            </a>
            <p class="card-text">{!! Str::limit($row->isi_berita, 50, '...') !!}</p>
            <a href="{{ url('read/'.$row->slug_berita) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </article>
      @endforeach
</div>
  </div>
</section>
<!-- /recommended post -->

@endsection