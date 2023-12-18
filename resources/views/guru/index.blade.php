@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('guru.create') }}" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus">Tambah</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered text-center" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Sosial Media</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guru as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_guru }}</td>
                                    <td>{{ $row->jabatan_guru }}</td>
                                    <td>
                                        <a href="https://www.facebook.com/{{ $row->facebook_guru }}" class="btn btn-dark btn-sm" target= "_blank" style="display: inline-block"><i class="fab fa-facebook"></i></a>
                                        <a href="https://instagram.com/{{ $row->instagram_guru }}" class="btn btn-dark btn-sm" target= "_blank" style="display: inline-block"><i class="fab fa-instagram"></i></a>
                                    </td>
                                    <td><img src="{{ asset('file/guru/'.$row->foto_guru) }}" alt="{{ $row->nama_guru }}" class="img-fluid" style="width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('guru.edit', $row->id_guru) }}" class="btn btn-primary btn-xs" style="display: inline-block"><i class="fas fa-edit"> Edit</i></a>
                                        <form action="{{ route('guru.destroy', $row->id_guru) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection