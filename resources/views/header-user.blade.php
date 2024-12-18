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
                <a class="navbar-brand" href="#">
                    <img src="https://via.placeholder.com/30" alt="Logo" style="width: 30px; height: 30px;">
                </a>
                <a class="nav-link" href="{{ route('welcome') }}" style="color: white;">Home</a>
                <a class="nav-link" href="{{ route('index_cat') }}" style="color: white;">All categories</a>
            </div>

            
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto d-flex flex-row">
                   <!-- Add -->
                </ul>
            </div>
        </div>
    </nav>











