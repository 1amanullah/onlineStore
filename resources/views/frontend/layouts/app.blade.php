<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title','Online Store')</title>
</head>
<body>
    <!-- header -->
    <nav  class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">  
        <div class="container">
            <a class="navbar-brand" href="#">Online Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="#navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link active" href="{{route('about-us')}}">About</a>
                </div>
            </div>
        </div>  
    </nav>
   <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-item-center flex-column">

      <h2>@yield('subtitle','Online Shopping')</h2>
    </div>
   </header>
   <div class="container my-4">
      @yield('content')
   </div>
   {{-- header --}}

   {{-- footer --}}


   <div class="copyright py-4 text-center text-white">
    <div class="container">
        <small>
            Copyright- &copy;<a class="text-rest fw-bold text-decoration-none" target="_blank" 
            href="https://laravel.com/docs/10.x"> All Right Reserved</a> - <b> Laravel10</b>
        </small>

    </div>

   </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>