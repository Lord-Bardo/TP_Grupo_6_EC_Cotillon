<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- Por ahora lo dejo aca porque en el styles no me funciona, CSS stuff como siempre -->
    
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
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <!-- Sección izquierda con logo y enlaces -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="https://via.placeholder.com/30" alt="Logo" style="width: 30px; height: 30px;">
                </a>
                <a class="nav-link" href="{{ route('welcome') }}" style="color: white;">Home</a>
                <a class="nav-link" href="{{ route('index_cat') }}" style="color: white;">All categories</a>
            </div>

            <!-- Formulario de búsqueda completamente a la derecha -->
            <form class="search-form" action="{{ route('search_products') }}" method="GET">
                <input class="form-control" type="search" name="producto" placeholder="Buscar productos..." aria-label="Search">
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </nav>













