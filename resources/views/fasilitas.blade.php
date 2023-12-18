@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Fasilitas</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Fasilitas SD Inpres 24 Ambon</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- research -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- recharch item -->
            @foreach ($fasilitas as $row)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                    <img class="card-img-top rounded-0" src="{{asset ('file/iventaris/'.$row->gambar_iventaris)}}" alt="research thumb">
                    <div class="card-body">
                        <h4 class="card-title">{{$row->nama_iventaris}} </h4>
                        <ul class="list-styled">
                            <li>Kondisi <b>{{$row->kondisi_iventaris}}</b> </li>
                            <li>Jumlah <b>{{$row->jumlah_iventaris}} Buah</b> </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- /research -->

@endsection