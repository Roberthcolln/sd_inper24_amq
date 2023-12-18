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
                <form action="{{ route('daftar_kegiatan.update', $daftar_kegiatan->id_daftar_kegiatan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-2">
                        <label for=""> Nama Kegiatan</label>
                        <select name="id_kegiatan" class="form-control" id="kegiatan-dd">
                            <option value=""></option>
                            @foreach ($kegiatan as $row)
                            <option @if ($daftar_kegiatan->id_kegiatan == $row->id_kegiatan) selected @endif value="{{ $row->id_kegiatan }}">{{ $row->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Anggota</label>
                        <select name="id" id="dropdown">
                            <option value=""></option>
                            @foreach ($user as $item)
                            <option @if ($daftar_kegiatan->id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
