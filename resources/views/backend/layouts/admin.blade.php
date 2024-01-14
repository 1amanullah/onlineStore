<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title','Admin - Online Shopping')</title>
</head>
<body>
    <div class="row g-0">
        {{-- sidebar --}}
        <div class="p-3 col fixed text-white bg-dark">
            <a href="{{route('admin.home.index')}}" class="text-white text-decoration-none">
              <span class="fs-4">Admin Panel</span>
            </a>
            <hr>
            <ul class="nav flex-column">
                <li><a href="{{route('admin.home.index')}}" class="nav-link text-white">Admin - Home</a></li>
                <li><a href="#" class="nav-link text-white">Admin - Products</a></li>
                <li>
                    <a href="{{route('admin.home.index')}}" class="nav-link text-white bg-"> Go back to home page</a>
                </li>
            </ul>
        </div>
       {{-- sidebar  --}}
       <div class="col content-grey">
        <nav class="p-3 shadow text-end">
         <span class="profile-font">Admin</span>
         <img src="{{asset('/img/undraw_profile.svg')}}" alt="" class="img-profile">
        </nav>
         <div class="g-0 m-5">
            @yield('content')
         </div>
        </div>
    </div>
    {{-- footer --}}
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright- <a href="https://laravel.com/docs/10.x" class="text-reset fw-bold text-decoration-none" target="_blank">
                 Amanullah Nilger
                </a>
            </small>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous"></script>
</body>
</html>