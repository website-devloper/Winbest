
<!DOCTYPE html>

@if (\Request::is('rtl'))
  <html dir="rtl" lang="ar">
@else
  <html lang="en" >
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif

  <style>
    /* Change the color of the second letter of the title to green */
    title::first-line::first-letter {
      color: rgb(128, 60, 0);
    }
  </style>

  <title>WinBest</title>  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}">
  <link  style="width: 100px;" rel="icon" href="{{ asset('assets/img/winbest.webp')}}" type="image/x-icon">
  <!-- Include Toastr CSS -->
<link rel="stylesheet" href="/path/to/toastr.min.css">
<!-- Add the Toastr CSS file link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- Add jQuery and Toastr JS files -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Include Toastr JS -->
<script src="/path/to/toastr.min.js"></script>

</head>

<style>
  footer{
    margin-left: 700px;
    
  }
        th {
            font-weight: bolder;
            font-size: 18px; /* Adjust the font size as needed */
            color: black;
        }
</style> 
<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

 
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <div class="copyright text-muted text-center mb-3">
    © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart"></i> by
    <a href="https://www.nettoyage-casablanca-maroc.com/" class="font-weight-bold" target="_blank">Creative Tim are Marwa and Fatime zahra.</a>
</div>





</body>

</html>
