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
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('rekening.update', $rekening->id_rekening) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama rekening <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama rekening disini...." name="nama_rekening" value="{{ $rekening->nama_rekening }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Nama Bank</label>
                            <input type="text" name="bank_rekening" class="form-control" placeholder="Masukkan nama bank disini...." value="{{ $rekening->bank_rekening }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">No. Rekening</label>
                            <input type="text" name="no_rekening" class="form-control" placeholder="Masukkan nomor rekening disini...." value="{{ $rekening->no_rekening }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="logo_rekening" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Preview Foto</label>
                            <img src="{{ asset('file/rekening/'.$rekening->logo_rekening) }}" alt="" style="width: 200px;" id="gambar_nodin">
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