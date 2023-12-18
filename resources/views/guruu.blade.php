@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Data Guru</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Para Pengajar SD Inpres 24 Ambon</p>
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
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".kepala-sekolah">Kepala Sekolah</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".wakil-kepala-sekolah">Wakil Kepala Sekolah</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".guru-kelas">Guru kelas</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".guru-bidang-studi">Guru Bidang Studi</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".tata-usaha">Tata Usaha & Tata Laksana</li>
                    <li class="list-inline-item m-3 text-uppercase" data-filter=".petugas-perpustakaan">Petugas Perpustakaan</li>


                </ul>
            </div>
        </div>
        <!-- teacher list -->
        <div class="row" data-ref="mixitup-container">
            <!-- teacher -->
            @foreach ($kepala_sekolah as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all kepala-sekolah ">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{$row->nama_guru}}</h4>
                        </a>
                        <p>{{$row->jabatan_guru}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($wakil_kepala_sekolah as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all wakil-kepala-sekolah">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{$row->nama_guru}}</h4>
                        </a>
                        <p>{{$row->jabatan_guru}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($guru_kelas as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all guru-kelas">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{$row->nama_guru}}</h4>
                        </a>
                        <p>{{$row->jabatan_guru}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($tata_usaha as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all tata-usaha">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{$row->nama_guru}}</h4>
                        </a>
                        <p>{{$row->jabatan_guru}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- teacher -->
            @foreach ($guru_bidang_study as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all guru-bidang-studi">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{$row->nama_guru}}</h4>
                        </a>
                        <p>{{$row->jabatan_guru}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- teacher -->
            @foreach ($petugas_perpustakaan as $row)
            <div data-ref="mixitup-target" class="col-lg-4 col-sm-6 mb-5 all petugas-perpustakaan">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{asset ('file/guru/'.$row->foto_guru)}}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{$row->nama_guru}}</h4>
                        </a>
                        <p>{{$row->jabatan_guru}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
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