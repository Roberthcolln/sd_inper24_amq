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
                    <form action="{{ route('partner.update', $partner->id_partner) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama Partner <abbr title="" style="color: black">*</abbr></label>
                            <input required type="text" class="form-control" placeholder="Masukkan nama partner disini...." name="nama_partner" value="{{ $partner->nama_partner }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jenis Galeri</label>
                            <select name="kategori_partner" id="dropdown" class="form-control">
                                <option></option>
                                <option @if ($partner->kategori_partner == 'Pemerintah') selected @endif value="Pemerintah">Pemerintah</option>
                                <option  @if ($partner->kategori_partner == 'Usaha') selected @endif value="BUMN">Usaha</option>
                                <option @if ($partner->kategori_partner == 'Komunitas') selected @endif value="Komunitas">Komunitas</option>
                                <option @if ($partner->kategori_partner == 'Pendidikan') selected @endif value="Pendidikan">Pendidikan</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Url Partner *(Jika tidak ada kosongkan saja)</label>
                            <input type="text" name="url_partner" class="form-control" value="{{ $partner->url_partner }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Logo Partner</label>
                            <input type="file" class="form-control" name="gambar_partner" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Preview Foto</label>
                            <img src="{{ asset('file/partner/'.$partner->gambar_partner) }}" alt="" style="width: 200px;" id="gambar_nodin">
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
@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
    }
        })
        .catch( error => {
            console.error( error );
        } );
  </script>
  <script>
      CKEDITOR.replace( 'editor', {
          filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
  </script>
@endsection