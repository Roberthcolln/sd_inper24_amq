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
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="">NISN</label>
                        <input type="number" class="form-control" placeholder="Masukkan nisn siswa disini..." name="nisn_siswa" value="{{ old('nisn_siswa') }}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Nama </label>
                        <input type="text" class="form-control" placeholder="Masukkan nama siswa disini..." name="nama_siswa" value="{{ old('nama_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat </label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat siswa disini..." name="alamat_siswa" value="{{ old('alamat_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="siswa-dd" class="form-control">
                            <option value=""></option>
                            @foreach ($kelas as $row)
                            <option value="{{ $row->id_kelas }}">{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Masukkan tempat lahir siswa disini..." name="tempat_lahir_siswa" value="{{ old('tempat_lahir_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="Masukkan tanggal lahir siswa disini..." name="tanggal_lahir_siswa" value="{{ old('tanggal_lahir_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin_siswa" id="dropdown">
                            <option></option>
                            <option>Laki- Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">No HP</label>
                        <input type="number" class="form-control" placeholder="Masukkan no hp siswa disini..." name="no_hp_siswa" value="{{ old('no_hp_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Ayah </label>
                        <input type="text" class="form-control" placeholder="Masukkan nama ayah siswa disini..." name="nama_ayah_siswa" value="{{ old('nama_ayah_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Pekerjaan Ayah</label>
                        <select name="pekerjaan_ayah_siswa" id="dropdown" class="form-control">
                            <option></option>
                            <option>PNS</option>
                            <option>TNI/ Polri</option>
                            <option>Guru</option>
                            <option>Karyawan BUMN</option>
                            <option>Pengusaha</option>
                            <option>Wiraswasta</option>
                            <option>Petani</option>
                            <option>Nelayan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat Ayah </label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat ayah disini..." name="alamat_ayah_siswa" value="{{ old('alamat_ayah_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Ibu </label>
                        <input type="text" class="form-control" placeholder="Masukkan nama ibu siswa disini..." name="nama_ibu_siswa" value="{{ old('nama_ibu_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Pekerjaan Ibu</label>
                        <select name="pekerjaan_ibu_siswa" id="dropdown" class="form-control">
                            <option></option>
                            <option>PNS</option>
                            <option>TNI/ Polri</option>
                            <option>Guru</option>
                            <option>Karyawan BUMN</option>
                            <option>Pengusaha</option>
                            <option>Wiraswasta</option>
                            <option>Petani</option>
                            <option>Nelayan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat Ibu </label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat ibu disini..." name="alamat_ibu_siswa" value="{{ old('alamat_ibu_siswa') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Foto <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="foto_siswa" class="form-control" required />
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
        .create(document.querySelector('#editor'), {

        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
@endsection