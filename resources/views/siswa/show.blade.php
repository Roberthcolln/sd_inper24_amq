@extends('layouts.index')
@section('content')
<div class="siswa">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <!-- <h3 class="card-title">{{ $title }} </h3> -->
                <a href="{{ route('siswa.index') }}" class="btn btn-warning" style="float: right;"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            <div class="card-body table table-responsive">
                <table class="table">
                    <tr>
                        <th style="width: 30%;">NISN</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->nisn_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Alamat </th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->alamat_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Kelas</th>
                        <th style="width: 20px;">:</th>
                        <td>{{$siswa->nama_kelas }}</td>
                    </tr>

                    <tr>
                        <th style="width: 30%;">Tempat Tanggal Lahir</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->tempat_lahir_siswa }}, {{ Carbon\Carbon::parse($siswa->tanggal_lahir_siswa)->isoFormat('D MMMM Y')  }}</td>
                    </tr>
                    
                    <tr>
                        <th style="width: 30%;">Jenis Kelamin</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->jenis_kelamin_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Telepon</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->no_hp_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama Ayah</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->nama_ayah_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Pekerjaan Ayah</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->pekerjaan_ayah_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Alamat Ayah</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->alamat_ayah_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama Ibu</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->nama_ibu_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Pekerjaan Ibu</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->pekerjaan_ibu_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Alamat Ibu</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $siswa->alamat_ibu_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Foto</th>
                        <th style="width: 20px;">:</th>
                        <td><img src="{{ asset('file/siswa/'.$siswa->foto_siswa) }}" alt="" style="width: 100px;"></td>
                    </tr>
                    

                </table>
            </div>
        </div>
    </div>
</div>

@endsection