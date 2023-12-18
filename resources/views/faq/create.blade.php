@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Pertanyaan <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan Pertanyaan disini...." name="pertanyaan">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jawaban <abbr title="" style="color: black">*</abbr> </label>
                            <textarea id="jawabanFAQ" class="form-control" placeholder="Masukkan Jawaban disini..." name="jawaban"></textarea> 
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script type="text/javascript">CKEDITOR.replace('jawabanFAQ');</script>
@endsection