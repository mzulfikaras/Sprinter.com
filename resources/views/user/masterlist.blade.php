<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets_user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets_user/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets_user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets_user/css/owl.css')}}">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    @include('user.layouts.preloader')
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('user.layouts.headerlist')

    
    <!-- Banner Ends Here -->
    @yield('content')



    
    @include('user.layouts.footer')


    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets_user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets_user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('assets_user/js/custom.js')}}"></script>
    <script src="{{asset('assets_user/js/owl.js')}}"></script>
    <script src="{{asset('assets_user/js/slick.js')}}"></script>
    <script src="{{asset('assets_user/js/isotope.js')}}"></script>
    <script src="{{asset('assets_user/js/accordions.js')}}"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>