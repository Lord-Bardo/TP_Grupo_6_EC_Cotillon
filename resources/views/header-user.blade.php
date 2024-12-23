<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="https://via.placeholder.com/30" alt="Logo" style="width: 30px; height: 30px;">
                </a>
                <a class="nav-link" href="{{ route('welcome') }}" style="color: white;">Home</a>
                <a class="nav-link" href="{{ route('index_cat') }}" style="color: white;">All categories</a>
                <a class="nav-link" href="{{ route('about-us') }}" style="color: white;">About Us</a>
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

    <!-- Estilos específicos -->
    <style>
        /* Estilo del formulario de búsqueda */
        .search-form {
            max-width: 500px;
            display: flex;
            align-items: center;
            margin-left: auto; /* Mueve el formulario completamente a la derecha */
        }
        .search-form input {
            border-radius: 0.25rem 0 0 0.25rem;
            border: 1px solid #4e504f;
        }
        .search-form button {
            border-radius: 0 0.25rem 0.25rem 0;
            background-color: #616662;
            color: white;
            border: none;
        }
        .search-form button:hover {
            background-color: #3d413e;
            transition: background-color 0.3s ease;
        }

        /* Estilo para el botón de Login */
        .btn-outline-light {
            background-color: #616662; /* Un color que combine con el navbar */
            color: white;
            border: none;
            border-radius: 0.25rem;
        }

        .btn-outline-light:hover {
            background-color: #4e504f; /* Color ligeramente más oscuro para el hover */
        }

        /* Estilo para el dropdown (no funciona) */
        .dropdown {
            margin-right: 20px; /* Ajusta este valor según sea necesario */
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* Asegura que no haya un desplazamiento raro */
        }

        .dropdown-menu {
            min-width: 200px;
        }
        .dropdown-item {
            color: #333;
            background-color: #fff;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #000;
        }

        /* Eliminar la flecha del dropdown */
        .dropdown-toggle::after {
            display: none; /* Esto elimina la flecha */
        }
    </style>




















