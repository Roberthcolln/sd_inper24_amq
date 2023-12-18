@extends('layouts.index')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>
          <a href="{{ route('kegiatan.create') }}" class="btn btn-dark btn-sm" style="float: right"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
          @if ($message = Session::get('Sukses'))
          <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
          </div>
          @endif
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Kegiatan</th>
                <th>Deskripsi</th>
                <th>Lokasi Kegiatan</th>
                <th>Waktu</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Publish</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="overflow-x-auto">
              @foreach ($kegiatan as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  {{ $row->nama_kategori_kegiatan }}
                  <br>
                  <span class="badge badge-warning">{{ $row->nama_sub_kategori_kegiatan }}</span>
                </td>
                <td>{{ $row->nama_kegiatan }}</td>
                <td>{!! Str::limit($row->deskripsi_kegiatan, 100, '...') !!}</td>
                <td>{{ $row->tempat_kegiatan }}</td>
                <td>{{ Carbon\Carbon::parse($row->tanggal_kegiatan)->isoFormat('dddd,D MMMM Y') }} <br><span class="badge badge-info">{{$row->jam_kegiatan }}</span> </td>
                <td>
                  @if ($row->biaya_kegiatan == 0)
                  <b>
                    <center>
                      <h5><span class="badge badge-danger"><i>Tanpa Biaya Administrasi</i></span></h5>
                    </center>
                    @elseif ($row->biaya_kegiatan > 1)
                    <b>
                      <center>
                        <h5><span class="badge badge-success"><i>Biaya Administrasi Rp.{{ number_format($row->biaya_kegiatan) }}</i></span></h5>
                      </center>

                      @endif
                </td>
                <td>{{ $row->nama_status_kegiatan }}</td>
                <td>{{ $row->nama_publish_kegiatan }}</td>
                <td><img src="{{ asset('file/kegiatan/'.$row->gambar_kegiatan) }}" alt="" class="img-fluid" style="width:200px; height:200px; max-width:100%;"></td>
                <td><a href="{{ route('kegiatan.edit', $row->id_kegiatan) }}" class="btn btn-primary btn-xs" role="button" style="display: inline-block"><i class="fas fa-edit">Edit</i></a>
                  <form action="{{ route('kegiatan.destroy', $row->id_kegiatan) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="Button" title="Delete" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Delete</i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection