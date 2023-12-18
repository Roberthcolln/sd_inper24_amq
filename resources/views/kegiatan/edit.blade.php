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
                    <form action="{{ route('kegiatan.update', $kegiatan->id_kegiatan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Kategori Kegiatan</label>
                        <select name="id_kategori_kegiatan" class="form-control" id="kegiatan-dd">
                            <option value=""></option>
                            @foreach ($kategori_kegiatan as $row)
                                <option @if ($kegiatan->id_kategori_kegiatan == $row->id_kategori_kegiatan) selected @endif value="{{ $row->id_kategori_kegiatan }}">{{ $row->nama_kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Sub Kategori Kegiatan</label>
                        <select name="id_sub_kategori_kegiatan" class = "form-control" id="sub-dd">
                            <option value=""></option>
                            @foreach ($sub_kategori_kegiatan as $sub)
                                <option @if ($kegiatan->id_sub_kategori_kegiatan == $sub->id_sub_kategori_kegiatan) selected @endif value="{{ $sub->id_sub_kategori_kegiatan }}">{{ $sub->nama_sub_kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama kegiatan disini..." name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi_kegiatan" id="editor" cols="30" rows="10">{{ $kegiatan->deskripsi_kegiatan }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tempat Kegiatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan tempat kegiatan disini..." name="tempat_kegiatan" value="{{ $kegiatan->tempat_kegiatan }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ $kegiatan->tanggal_kegiatan }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jam Kegiatan</label>
                        <input type="time" name="jam_kegiatan" class="form-control" value="{{ $kegiatan->jam_kegiatan }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Biaya Kegiatan</label>
                        <input type="number" name="biaya_kegiatan" class="form-control" value="{{ $kegiatan->biaya_kegiatan }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Status</label>
                        <select name="id_status_kegiatan" class="form-control" id="kegiatan-dd">
                            <option value=""></option>
                            @foreach ($status_kegiatan as $row)
                                <option @if ($kegiatan->id_status_kegiatan == $row->id_status_kegiatan) selected @endif value="{{ $row->id_status_kegiatan }}">{{ $row->nama_status_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Publish</label>
                        <select name="id_publish_kegiatan" class="form-control" id="kegiatan-dd">
                            <option value=""></option>
                            @foreach ($publish_kegiatan as $row)
                                <option @if ($kegiatan->id_publish_kegiatan == $row->id_publish_kegiatan) selected @endif value="{{ $row->id_publish_kegiatan }}">{{ $row->nama_publish_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Foto <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="gambar_kegiatan" class="form-control">
                        <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
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
@section('script')
@section('script')
<script>
    document.getElementById('inputImg').addEventListener('change', function() {
        // Get the file input value and create a URL for the selected image
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
                document.getElementById('previewImg').classList.add("d-block");
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
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
@endsection