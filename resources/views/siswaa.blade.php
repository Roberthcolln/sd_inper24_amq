@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Data Siswa</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Para Siswa dan Siswi SD Inpres 24 Ambon</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- teachers -->
<section class="section">
    <div data-ref="mixitup-target" class="container">
        <div class="row">
            <div class="col-12">
                <!-- teacher category list -->
                <ul class="list-inline text-center filter-controls mb-5">
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".all">Semua</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kelas-1">Kelas 1</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kelas-2">Kelas 2</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kelas-3">Kelas 3</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kelas-4">Kelas 4</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kelas-5">Kelas 5</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kelas-6">Kelas 6</li>


                </ul>
            </div>
        </div>
        <!-- teacher list -->
        <div class="row" data-ref="mixitup-container">
            <!-- teacher -->
            @foreach ($kelas_1 as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kelas-1 ">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/siswa/'.$row->foto_siswa)}}" alt="teacher">
                    <div class="card-body">
                        
                            <h4 class="card-title">{{$row->nama_siswa}}</h4>
                        
                        <a href="{{ url('lihat-siswa/'.$row->slug_siswa) }}" class="btn btn-primary btn-sm">Detail Siswa</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($kelas_2 as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kelas-2">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/siswa/'.$row->foto_siswa)}}" alt="teacher">
                    <div class="card-body">
                        
                            <h4 class="card-title">{{$row->nama_siswa}}</h4>
                        
                        <a href="{{ url('lihat-siswa/'.$row->slug_siswa) }}" class="btn btn-primary btn-sm">Detail Siswa</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($kelas_3 as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kelas-3">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/siswa/'.$row->foto_siswa)}}" alt="teacher">
                    <div class="card-body">
                        
                            <h4 class="card-title">{{$row->nama_siswa}}</h4>
                        
                        <a href="{{ url('lihat-siswa/'.$row->slug_siswa) }}" class="btn btn-primary btn-sm">Detail Siswa</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($kelas_4 as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kelas-4">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/siswa/'.$row->foto_siswa)}}" alt="teacher">
                    <div class="card-body">
                        
                            <h4 class="card-title">{{$row->nama_siswa}}</h4>
                        
                        <a href="{{ url('lihat-siswa/'.$row->slug_siswa) }}" class="btn btn-primary btn-sm">Detail Siswa</a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- teacher -->
            @foreach ($kelas_5 as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kelas-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/siswa/'.$row->foto_siswa)}}" alt="teacher">
                    <div class="card-body">
                        
                            <h4 class="card-title">{{$row->nama_siswa}}</h4>
                        
                        <a href="{{ url('lihat-siswa/'.$row->slug_siswa) }}" class="btn btn-primary btn-sm">Detail Siswa</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($kelas_6 as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kelas-6">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/siswa/'.$row->foto_siswa)}}" alt="teacher">
                    <div class="card-body">
                        
                            <h4 class="card-title">{{$row->nama_siswa}}</h4>
                        
                        <a href="{{ url('lihat-siswa/'.$row->slug_siswa) }}" class="btn btn-primary btn-sm">Detail Siswa</a>
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