<?php
$konf = DB::table('setting')->first();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Website - {{$konf->instansi_setting}}</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('web/plugins/bootstrap/bootstrap.min.css') }}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{ asset('web/plugins/slick/slick.css') }}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{ asset('web/plugins/themify-icons/themify-icons.css') }}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{ asset('web/plugins/animate/animate.css') }}">
  <!-- aos -->
  <link rel="stylesheet" href="{{ asset('web/plugins/aos/aos.css') }}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="{{ asset('web/plugins/venobox/venobox.css') }}">

  <!-- Main Stylesheet -->
  <link href="{{asset ('web/css/style.css') }}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{asset ('favicon/'.$konf->favicon_setting)}}" type="image/x-icon">
  <link rel="icon" href="{{asset ('favicon/'.$konf->favicon_setting)}}" type="image/x-icon">

</head>
<style>
  .blink {
                animation: blinker 1.5s linear infinite;
                color: gray;
                font-family: sans-serif;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
</style>

<body>


  <!-- header -->
  <header class="fixed-top header">
    <!-- top header -->
    <div class="top-header py-2 bg-white">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-4 text-center text-lg-left">
            <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> {{$konf->no_hp_setting}}</a>
            <ul class="list-inline d-inline">
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-8 text-center text-lg-right">
            <ul class="list-inline">
              <h4><marquee class="blink"><i>" Selamat Datang Di Website Resmi {{$konf->instansi_setting}} "</i></marquee></h4>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <div class="navigation w-100">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <a class="navbar-brand" href="index.html"><img src="{{asset ('logo/'.$konf->logo_setting)}}" style="width: 25%;" alt="logo"></a>
          <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item ">
                <a class="nav-link" href="{{url ('/')}}">Home</a>
              </li>
              <li class="nav-item @@about">
                <a class="nav-link" href="{{url ('tentang')}}">About</a>
              </li>
              <li class="nav-item @@courses">
                <a class="nav-link" href="{{url ('programm')}}">Program</a>
              </li>
              <li class="nav-item @@events">
                <a class="nav-link" href="{{url ('kegiatann')}}">Kegiatan</a>
              </li>
              <li class="nav-item @@blog">
                <a class="nav-link" href="{{url ('news')}}">Berita</a>
              </li>
              <li class="nav-item dropdown view">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Halaman
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url ('guruu')}}">Guru</a>
                  <a class="dropdown-item" href="{{url ('siswaa')}}">Siswa</a>
                  <a class="dropdown-item" href="{{url ('kelass')}}">Kelas</a>
                  <a class="dropdown-item" href="{{url ('fasilitas')}}">Fasilitas</a>
                  <a class="dropdown-item" href="{{url ('galerii')}}">Gallery</a>
                  <a class="dropdown-item" href="https://drive.google.com/file/d/1pTs7KZNwJkWU_pYyskPrXJ4_5byGfp3h/view?usp=drive_link" target="_blank">Unduh Banner</a>
                  
                 
                </div>
              </li>
              <li class="nav-item @@contact">
                <a class="nav-link" href="{{url ('kontak')}}">Kontak</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- /header -->
  <!-- Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4">
        <div class="modal-header border-0">
          <h3>Register</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="login">
            <form action="#" class="row">
              <div class="col-12">
                <input type="text" class="form-control mb-3" id="signupPhone" name="signupPhone" placeholder="Phone">
              </div>
              <div class="col-12">
                <input type="text" class="form-control mb-3" id="signupName" name="signupName" placeholder="Name">
              </div>
              <div class="col-12">
                <input type="email" class="form-control mb-3" id="signupEmail" name="signupEmail" placeholder="Email">
              </div>
              <div class="col-12">
                <input type="password" class="form-control mb-3" id="signupPassword" name="signupPassword" placeholder="Password">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">SIGN UP</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4">
        <div class="modal-header border-0">
          <h3>Login</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" class="row">
            <div class="col-12">
              <input type="text" class="form-control mb-3" id="loginPhone" name="loginPhone" placeholder="Phone">
            </div>
            <div class="col-12">
              <input type="text" class="form-control mb-3" id="loginName" name="loginName" placeholder="Name">
            </div>
            <div class="col-12">
              <input type="password" class="form-control mb-3" id="loginPassword" name="loginPassword" placeholder="Password">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @yield('isi')

  @yield('content')

  <!-- footer -->
  <footer>
    <!-- newsletter -->
    <div class="newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
            <h3 class="text-white">Subscribe Now</h3>
            <form action="#">
              <div class="input-wrapper">
                <input type="email" class="form-control border-0" id="newsletter" name="newsletter" placeholder="Enter Your Email...">
                <button type="submit" value="send" class="btn btn-primary">Join</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- footer content -->
    <div class="footer bg-footer section border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
            <!-- logo -->
            <a class="logo-footer" href="index.html"><img class="img-fluid mb-4" src="{{asset ('logo/'.$konf->logo_setting)}}" style="width: 25%;" alt="logo"></a>
            <ul class="list-unstyled">
              <li class="mb-2">{{$konf->alamat_setting}}</li>
              <li class="mb-2">{{$konf->no_hp_setting}}</li>
              
              <li class="mb-2">{{$konf->email_setting}}</li>
            </ul>
          </div>
          <!-- company -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">COMPANY</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="about.html">About Us</a></li>
              <li class="mb-3"><a class="text-color" href="teacher.html">Our Teacher</a></li>
              <li class="mb-3"><a class="text-color" href="contact.html">Contact</a></li>
              <li class="mb-3"><a class="text-color" href="blog.html">Blog</a></li>
            </ul>
          </div>
          <!-- links -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">LINKS</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="courses.html">Courses</a></li>
              <li class="mb-3"><a class="text-color" href="event.html">Events</a></li>
              <li class="mb-3"><a class="text-color" href="gallary.html">Gallary</a></li>
              <li class="mb-3"><a class="text-color" href="faqs.html">FAQs</a></li>
            </ul>
          </div>
          <!-- support -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">SUPPORT</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="#">Forums</a></li>
              <li class="mb-3"><a class="text-color" href="#">Documentation</a></li>
              <li class="mb-3"><a class="text-color" href="#">Language</a></li>
              <li class="mb-3"><a class="text-color" href="#">Release Status</a></li>
            </ul>
          </div>
          <!-- support -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">RECOMMEND</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="#">WordPress</a></li>
              <li class="mb-3"><a class="text-color" href="#">LearnPress</a></li>
              <li class="mb-3"><a class="text-color" href="#">WooCommerce</a></li>
              <li class="mb-3"><a class="text-color" href="#">bbPress</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- copyright -->
    <div class="copyright py-4 bg-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text-sm-left text-center">
            <p class="mb-0">Copyright
              <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script>
              ©  <a href="https://themefisher.com">{{$konf->instansi_setting}}</a>
            </p> 
          </div>
          <div class="col-sm-5 text-sm-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.facebook.com/themefisher"><i class="ti-facebook text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.twitter.com/themefisher"><i class="ti-twitter-alt text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-instagram text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://dribbble.com/themefisher"><i class="ti-dribbble text-primary"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

  <!-- jQuery -->
  <script src="{{ asset('web/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ asset('web/plugins/bootstrap/bootstrap.min.js')}}"></script>
  <!-- slick slider -->
  <script src="{{ asset('web/plugins/slick/slick.min.js')}}"></script>
  <!-- aos -->
  <script src="{{ asset('web/plugins/aos/aos.js')}}"></script>
  <!-- venobox popup -->
  <script src="{{ asset('web/plugins/venobox/venobox.min.js')}}"></script>
  <!-- mixitup filter -->
  <script src="{{ asset('web/plugins/mixitup/mixitup.min.js')}}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="{{ asset('web/plugins/google-map/gmap.js')}}"></script>

  <!-- Main Script -->
  <script src="{{ asset ('web/js/script.js')}}"></script>

</body>

</html>