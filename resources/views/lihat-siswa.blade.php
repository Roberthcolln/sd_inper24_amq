@extends('layouts.web')
@section('isi')
<!-- page title -->
<section class="page-title-section overlay" data-background="{{asset ('web/images/backgrounds/page-title.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{url('siswaa')}}">Detail Siswa</a></li>
                    <li class="list-inline-item text-white h3 font-secondary nasted">{{$siswa->nama_siswa}}</li>
                </ul>
                <p class="text-lighten">Pelajar {{$konf->instansi_setting}}</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- teacher details -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-5">
                <img class="img-fluid w-100" src="{{asset ('file/siswa/'.$siswa->foto_siswa)}}" alt="teacher">
            </div>
            <div class="col-md-6 mb-5">
                <h3>{{$siswa->nama_siswa}}</h3>
                <h6 class="text-color">{{$siswa->nama_kelas}}</h6>
                <p class="mb-5">Pelajar {{$konf->instansi_setting}}</p>
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h4 class="mb-4">Data Siswa :</h4>
                        <ul class="list-styled">
                            <li>NISN : <b>{{$siswa->nisn_siswa}}</b></li>
                            <li>Kelas : <b>{{$siswa->nama_kelas}}</b></li>
                            <li>Jenis Kelamin : <b>{{$siswa->jenis_kelamin_siswa}}</b></li>
                            <li>Tempat Lahir : <b>{{$siswa->tempat_lahir_siswa}}</b></li>
                            <li>Tanggal Lahir : <b>{{ Carbon\Carbon::parse($siswa->tanggal_lahir_siswa)->isoFormat('D MMMM Y')  }}</b></li>
                            <li>Alamat : <b>{{$siswa->alamat_siswa}}</b></li>
                            <li>No HP : <b>{{$siswa->no_hp_siswa}}</b></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Data Orang Tua Murid </h4>
                        <ul class="list-styled">
                            <li>Nama Ayah : <b>{{$siswa->nama_ayah_siswa}}</b></li>
                            <li>Pekerjaan Ayah : <b>{{$siswa->pekerjaan_ayah_siswa}}</b></li>
                            <li>Alamat Ayah : <b>{{$siswa->alamat_ayah_siswa}}</b></li>
                            <li>Nama Ibu : <b>{{$siswa->nama_ibu_siswa}}</b></li>
                            <li>Pekerjaan Ibu : <b>{{$siswa->pekerjaan_ibu_siswa}}</b></li>
                            <li>Alamat Ibu : <b>{{$siswa->alamat_ibu_siswa}}</b></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- /teacher details -->

@endsection