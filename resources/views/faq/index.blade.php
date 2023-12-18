@extends('layouts.index')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>
          <button type="button" class="btn btn-dark btn-sm" style="float: right;"><a class="text-white"
              href="{{route('faq.create')}}"><i class="fas fa-plus"> Tambah</i></a></button>
        </div>
        <div class="card-body">
          @if ($message = Session::get('Sukses'))
          <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
          </div>
          @endif
          @if ($message = Session::get('Delete'))
          <div class="alert alert-danger">
            <p class="m-0">{{ $message }}</p>
          </div>
          @endif
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($faqs as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->pertanyaan }}</td>
                <td>{!! $row->jawaban !!}</td>
                <td><a href="{{ route('faq.edit', $row->id) }}" class="btn btn-primary btn-xs" role="button"
                    style="display: inline-block"><i class="fas fa-edit">Update</i></a>
                  <form action="{{ route('faq.destroy', $row->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="Button" title="Delete"
                      class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash">Destroy</i></button>
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