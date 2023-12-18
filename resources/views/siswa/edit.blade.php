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
                <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-2">
                        <label for="">NISN</label>
                        <input type="number" name="nisn_siswa" class="form-control" value="{{ $siswa->nisn_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat_siswa" class="form-control" value="{{ $siswa->alamat_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Kelas</label>
                        <select name="id_kelas" class="form-control" id="siswa-dd">
                            <option value=""></option>
                            @foreach ($kelas as $row)
                            <option @if ($siswa->id_kelas == $row->id_kelas) selected @endif value="{{ $row->id_kelas }}">{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir_siswa" class="form-control" value="{{ $siswa->tempat_lahir_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir_siswa" class="form-control" value="{{ $siswa->tanggal_lahir_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin_siswa" id="dropdown">
                            <option></option>
                            <option @if ($siswa->jenis_kelamin_siswa == 'Laki- Laki') selected @endif value = "Laki- Laki">Laki- Laki</option>
                            <option @if ($siswa->jenis_kelamin_siswa == 'Perempuan') selected @endif value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">No HP</label>
                        <input type="number" name="no_hp_siswa" class="form-control" value="{{ $siswa->no_hp_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Ayah</label>
                        <input type="text" name="nama_ayah_siswa" class="form-control" value="{{ $siswa->nama_ayah_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Pekerjaan Ayah</label>
                        <select name="pekerjaan_ayah_siswa" id="dropdown" class="form-control">
                            <option></option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'PNS') selected @endif value = "PNS">PNS</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'TNI/ Polri') selected @endif value="TNI/ Polri">TNI/ Polri</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Guru') selected @endif value="Guru">Guru</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Karyawan BUMN') selected @endif value = "Karyawan BUMN">Karyawan BUMN</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Pengusaha') selected @endif value="Pengusaha">Pengusaha</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Wiraswasta') selected @endif value = "Wiraswasta">Wiraswasta</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Petani') selected @endif value="Petani">Petani</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Nelayan') selected @endif value = "Nelayan">Nelayan</option>
                            <option @if ($siswa->pekerjaan_ayah_siswa == 'Lainnya') selected @endif value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat Ayah</label>
                        <input type="text" name="alamat_ayah_siswa" class="form-control" value="{{ $siswa->alamat_ayah_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Ibu</label>
                        <input type="text" name="nama_ibu_siswa" class="form-control" value="{{ $siswa->nama_ibu_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Pekerjaan Ibu</label>
                        <select name="pekerjaan_ibu_siswa" id="dropdown" class="form-control">
                            <option></option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'PNS') selected @endif value = "PNS">PNS</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'TNI/ Polri') selected @endif value="TNI/ Polri">TNI/ Polri</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Guru') selected @endif value="Guru">Guru</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Karyawan BUMN') selected @endif value = "Karyawan BUMN">Karyawan BUMN</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Pengusaha') selected @endif value="Pengusaha">Pengusaha</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Wiraswasta') selected @endif value = "Wiraswasta">Wiraswasta</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Petani') selected @endif value="Petani">Petani</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Nelayan') selected @endif value = "Nelayan">Nelayan</option>
                            <option @if ($siswa->pekerjaan_ibu_siswa == 'Lainnya') selected @endif value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat Ibu</label>
                        <input type="text" name="alamat_ibu_siswa" class="form-control" value="{{ $siswa->alamat_ibu_siswa }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Foto <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="foto_siswa" class="form-control">
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