@extends('layouts.web')
@section('isi')

<!-- page title -->
<section class="page-title-section overlay" data-background="web/images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Kontak</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Kontak Informasi SD Inpres 24 Ambon</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">Contact Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <form action="#">
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
                    <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email">
                    <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
                    <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
                    <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
                </form>
            </div>
            <div class="col-lg-5">
                <p class="mb-5">{!!$konf->tentang_setting!!}</p>
                <a href="tel:{{$konf->no_hp_setting}}" class="text-color h5 d-block">{{$konf->no_hp_setting}}</a>
                <a href="mailto:{{$konf->email_setting}}" class="mb-5 text-color h5 d-block">{{$konf->email_setting}}</a>
                <p>{{$konf->alamat_setting}}</p>
            </div>
        </div>
    </div>
</section>
<!-- /contact -->

<!-- gmap -->
<section class="section pt-0">
    <!-- Google Map -->
    <iframe class="w-100 rounded" src="{{ $konf->maps_setting }}" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
<!-- /gmap -->
@endsection