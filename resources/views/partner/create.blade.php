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
                    <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Nama Partner <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan nama partner disini...." name="nama_partner" value="{{ old('nama_partner') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Kategori Partner</label>
                            <select name="kategori_partner" id="dropdown" class="form-control">
                                <option></option>
                                <option>Pemerintah</option>
                                <option>Usaha</option>
                                <option>Komunitas</option>
                                <option>Pendidikan</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Url Partner *(Jika tidak ada kosongkan saja)</label>
                            <input type="text" name="url_partner" class="form-control" placeholder="Masukkan url partner disini..." value="{{ old('url_partner') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Logo Partner <abbr title="" style="color: black">*</abbr> </label>
                            <input id="inputImg" type="file" accept="image/*" name="gambar_partner" class="form-control">
                            <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
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
@endsection