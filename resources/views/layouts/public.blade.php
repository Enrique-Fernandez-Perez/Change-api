@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tu Página</title>
    <!-- Agrega enlaces a los archivos CSS de Bootstrap -->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<body>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand align-middle" href="{{route('home')}}">
        <!-- <img src="tu_logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> -->
        <img src="https://cdn3.iconfinder.com/data/icons/complete-set-icons/512/video512x512.png" width="30" height="30" class="d-inline-block align-top" alt="">
        YourSee
    </a>

    <!-- Input de búsqueda y botón -->
    <span class="align-middle mx-auto pt-sm-0 mt-sm-0 pt-5 mt-1" method="get">
        <form class="form-inline align-bottom justify-content-center mx-auto" method="get" >
{{--            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">--}}
{{--            <input class="w-8 border-danger border-3 mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">--}}
            <input class="w-auto border-2 mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn border-danger border-3 btn-light my-2 my-sm-0" type="submit">
                <!-- <img src="lupa.png" width="20" height="20" alt=""> -->
                <img src="https://cdn.icon-icons.com/icons2/1744/PNG/512/3643762-find-glass-magnifying-search-zoom_113420.png" width="20" height="20" alt="">
            </button>
        </form>
    </span>

<?php if(Auth::check()){?>

    <button class="navbar-toggler position-absolute top-0 end-0 mt-1 me-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse position-absolute end-0 mx-auto" id="collapsibleNavbar">

<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{asset('vendor/assets/images/faces/face8.jpg')}}" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
                <p class="mb-1 mt-3 font-weight-semibold"><?=Auth::user()->nombre?></p>
                <p class="font-weight-light text-muted mb-0"><?=Auth::user()->email?></p>
            </div>
            <a class="dropdown-item" href ="{{route('profile.edit')}}">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>

            <a class="dropdown-item" href ="{{route('canal.show')}}">Canal<span class="badge badge-pill badge-danger">2</span><i class="dropdown-item-icon ti-dashboard"></i></a>
            <a class="dropdown-item" href ="{{route('video.create')}}">Subir Video<span class="badge badge-pill badge-danger">3</span><i class="dropdown-item-icon ti-dashboard"></i></a>

            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout').submit();" >Sign Out<i class="dropdown-item-icon ti-dashboard"></i></a>
            <form id="logout" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>

<?php }else{  ?>
    <button class="navbar-toggler position-absolute top-0 end-0 mt-1 me-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse position-absolute end-0 mx-auto" id="collapsibleNavbar">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link fs-5 m-2 link-danger" href="{{route('register')}}">Registrarse</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-5 m-2 link-danger" href="{{route('login')}}">Iniciar Sesión</a>
        </li>
    </ul>

<!-- <a class="nav-link fs-5 m-2 link-danger" href="{{route('register')}}">Register</a>
<a class="nav-link fs-5 m-2 link-danger" href="{{route('login')}}">Login</a> -->

<?php } ?>


</nav>

@yield('content')

<!-- Footer con información de contacto -->
<footer class="bg-light text-center mt-5 p-3">
    <p>Contacto: tuemail@example.com | Teléfono: (123) 456-7890</p>
</footer>

<!-- Agrega enlaces a los archivos JavaScript de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
