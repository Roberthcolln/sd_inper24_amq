@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Kegiatan</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Kegiatan SD Inpres 24 Ambon</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- event -->
            @foreach ($kegiatan as $row)
            @if ($row->id_publish_kegiatan == 1)
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="{{asset ('file/kegiatan/'.$row->gambar_kegiatan)}}" alt="event thumb">
                        <div class="card-date"><span>{{ Carbon\Carbon::parse($row->tanggal_kegiatan)->isoFormat('D') }} </span><br>{{ Carbon\Carbon::parse($row->tanggal_kegiatan)->isoFormat('MMMM') }} </div>
                    </div>
                    <div class="card-body">
                        <!-- location -->
                        <p><i class="ti-location-pin text-primary mr-2"></i>{{$row->tempat_kegiatan}}</p>
                        
                            <h4 class="card-title">{{$row->nama_kegiatan}}</h4>
                        
                        <a href="{{ url('lihat-kegiatan/'.$row->slug_kegiatan) }}" class="btn btn-primary btn-sm">Detail Kegiatan</a>
                    </div>
                </div>
            </div>
            @else
            @endif
            
            @endforeach

            <!-- event -->

        </div>
    </div>
</section>
<!-- /courses -->
@endsection