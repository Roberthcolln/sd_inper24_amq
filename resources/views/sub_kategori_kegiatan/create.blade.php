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
                    <form action="{{ route('sub_kategori_kegiatan.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="">Kategori Kegiatan</label>
                        <select name="id_kategori_kegiatan" id="dropdown" class="form-control">
                            <option value="">Silahkan Pilih Kategori Kegiatan</option>
                            @foreach ($kategori_kegiatan as $row)
                                <option value="{{ $row->id_kategori_kegiatan }}">{{ $row->nama_kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sub Kategori Kegiatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama sub kategori kegiatan disini..." name="nama_sub_kategori_kegiatan">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection