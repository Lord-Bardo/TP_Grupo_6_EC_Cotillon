<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="d-flex flex-column vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-pastel mb-0">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a class="navbar-brand me-3" href="{{ route('welcome') }}">
                    <img src="{{ asset('images/ec-cotillon-logo.png') }}" alt="Logo" style="width: 30px; height: 30px;">
                </a>
                <a class="nav-link me-3" href="{{ route('welcome') }}">Home</a>
                <a class="nav-link me-3" href="{{ route('index_cat') }}">All categories</a>
                <a class="nav-link me-3" href="{{ route('about-us') }}">About Us</a>
                @if(auth()->check() && auth()->user()->role == 'admin')
                    <a class="nav-link" href="{{ route('admin.abm-list') }}" style="color: white;">ABM</a>
                @endif
            </div>
            <div class="d-flex align-items-center">
                @if(auth()->check())
                    <div class="dropdown">
                        <button class="btn btn-outline-light" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->username}}
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Si no está logueado, mostrar botón de Login -->
                    <a href="{{ route('user-log.r_view_login_remake') }}" class="btn btn-outline-light mr-3">Ingresá</a>
                @endif

                <form class="search-form" action="{{ route('search_products') }}" method="GET">
                    <input class="form-control" type="search" name="producto" placeholder="Buscar productos..." aria-label="Search">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

<style>
    .bg-pastel {
        background-color: #8eb5ca; /* Tonalidad pastel melón */
        color: #e46363; /* Texto oscuro para contraste */
    }
</style>





















