@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('guru.update', $guru->id_guru) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama disini...." name="nama_guru" value="{{ $guru->nama_guru }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jabatan Guru</label>
                            <select name="jabatan_guru" id="dropdown">
                                <option></option>
                                <option @if ($guru->jabatan_guru == 'Kepala Sekolah') selected @endif value = "Kepala Sekolah">Kepala Sekolah</option>
                                <option @if ($guru->jabatan_guru == 'Wakil Kepala Sekolah') selected @endif value = "Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                                <option @if ($guru->jabatan_guru == 'Guru Kelas') selected @endif value = "Guru Kelas">Guru Kelas</option>
                                <option @if ($guru->jabatan_guru == 'Guru Bidang Studi') selected @endif value = "Guru Bidang Studi">Guru Bidang Studi</option>
                                <option @if ($guru->jabatan_guru == 'Tata Usaha') selected @endif value = "Tata Usaha">Tata Usaha</option>
                                <option @if ($guru->jabatan_guru == 'Petugas Perpustakaan') selected @endif value = "Petugas Perpustakaan">Petugas Perpustakaan</option>

                            </select>
                        </div>
                        
                        <div class="form-group mb-2">
                            <label for="">Akun Facebook</label>
                            <input type="text" name="facebook_guru" class="form-control" value="{{ $guru->facebook_guru }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Akun Instagram</label>
                            <input type="text" name="instagram_guru" class="form-control" value="{{ $guru->instagram_guru }}">
                        </div>
                        <div class="form-group mb-3">
                        <label for="">Foto <abbr title="">* 512 X 512 Pixels</abbr> </label>
                            <input type="file" class="form-control" name="foto_guru" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Preview Foto</label>
                            <img src="{{ asset('file/guru/'.$guru->foto_guru) }}" alt="" style="width: 200px;" id="gambar_nodin">
                        </div>      
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection