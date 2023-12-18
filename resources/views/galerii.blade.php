@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Gallery</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Dokumentasi SD Inpres 24 Ambon</p>
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
            @foreach ($galeri as $row)
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                    <a href="{{asset ('file/galeri/'.$row->gambar_galeri)}}" class="gallery-lightbox">
                        <img src="{{asset ('file/galeri/'.$row->gambar_galeri)}}" alt="scholarship-thumb" class="img-fluid">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{$row->nama_galeri}}</h4>
                        <p class="mb-1">{!!$row->keterangan_galeri!!}</p>
                        <!-- <ul class="list-styled">
                            <li>institutes</li>
                            <li>Smart-affiliated research</li>
                            <li>Digital Access to Scholarship</li>
                            <li>Smart Catalyst</li>
                            <li>Smart Library Portal</li>
                            <li>Smart research programs</li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @endforeach

            <!-- scholarship item -->

        </div>
    </div>
</section>
<!-- /scholarship -->
@endsection