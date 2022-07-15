<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Atal Amrit Abhiyan Society : ARM/PMAM Recruitment</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Atal Amrit Abhiyan Society ARM/PMAM Recruitment Official Website">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="nitishdola">
  <meta name=generator content="Atal Amrit Abhiyan Society : ARM/PMAM Recruitment">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <!-- <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.min.css') }}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/animate-css/animate.css') }}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick-theme.css') }}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/colorbox/colorbox.css') }}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <style>
    .help-inline { color:  #c70039 ; }
  </style>

  @yield('pageCss')

</head>
  <body>

    <div class="body-inner">
      <header id="header" class="header-one">
        @include('layouts.frontend.common.header')
      </header>
      <section id="ts-features" class="ts-features">
        <div class="container">
          @yield('main_content')
        </div>
      </section>
      @include('layouts.frontend.common.footer')
      <!-- Javascript Files
    ================================================== -->

      <!-- initialize jQuery Library -->
      <script src="{{ asset('frontend/plugins/jQuery/jquery.min.js') }}"></script>
      <!-- Bootstrap jQuery -->
      <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
      <!-- Slick Carousel -->
      <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
      <script src="{{ asset('frontend/plugins/slick/slick-animation.min.js') }}"></script>
      <!-- Color box -->
      <script src="{{ asset('frontend/plugins/colorbox/jquery.colorbox.js') }}"></script>
      <!-- shuffle -->
      <script src="{{ asset('frontend/plugins/shuffle/shuffle.min.js') }}" defer></script>
      <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
      <!--custom JS -->
      <script src="{{ asset('frontend/js/script.js') }}"></script>

      @yield('pageJs')

    </div><!-- Body inner end -->
  </body>

</html>