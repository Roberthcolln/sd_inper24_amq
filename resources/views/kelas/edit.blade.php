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
                    <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    
                    <div class="form-group mb-2">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama kelas disini..." name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Deskripsi Kelas</label>
                        <textarea name="deskripsi_kelas" id="editor" cols="30" rows="10">{{ $kelas->deskripsi_kelas }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Wali kelas</label>
                        <select name="id_guru" class="form-control" id="kelas-dd">
                            <option value=""></option>
                            @foreach ($guru as $row)
                                <option @if ($kelas->id_guru == $row->id_guru) selected @endif value="{{ $row->id_guru }}">{{ $row->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jumlah siswa</label>
                        <input type="number" class="form-control" placeholder="Masukkan jumlah siswa disini..." name="jumlah_siswa" value="{{ $kelas->jumlah_siswa }}">
                    </div>
            
                    <div class="form-group mb-2">
                        <label for="">Gambar Kelas <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="gambar_kelas" class="form-control">
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