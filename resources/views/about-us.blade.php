@include('header-user')

<div class="container my-5">
    
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/oso.png') }}" alt="Mission Image" 
                 class="img-fluid rounded-circle shadow animated-oso" 
                 id="oso">
        </div>
        <div class="col-md-6 text-center text-md-left">
            <h2 class="font-weight-bold text-pastel">Nuestra Misión</h2>
            <p class="lead text-muted">Crear oportunidades económicas que impulsen el potencial colectivo del país, brindando una plataforma eficiente y accesible para conectar vendedores y compradores.</p>
        </div>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('images/pingu.png') }}" alt="Founding Story Image" class="img-fluid rounded-circle shadow">
        </div>
        <div class="col-md-6 order-md-1 text-center text-md-left">
            <h2 class="font-weight-bold text-pastel">Nuestra Historia</h2>
            <p class="lead text-muted">"En 2015, en el corazón de CABA, nació nuestra tienda de cotillón con un sueño: hacer de cada celebración un momento inolvidable. Empezamos con una pequeña selección de artículos y, con el tiempo, nos hemos convertido en el destino online para todo tipo de fiestas. Desde cumpleaños hasta bodas, ofrecemos productos de calidad y diversión, entregados directamente a tu puerta para que disfrutes sin preocupaciones. ¡Celebra con nosotros y haz que tu fiesta sea única!"</p>
        </div>
    </div>

    <hr style="border: 0; border-top: 1px solid #a09f9f; margin: 30px 0;">

    <div class="text-center mb-5">
        <h2 class="font-weight-bold text-pastel">Nuestro Equipo</h2>
    </div>
    
    <div class="row text-center">

        <div class="col-md-3 mb-4">
            <img src="{{ asset('images/facu.png') }}" alt="Integrante 1" class="img-fluid rounded-circle mb-3" style="width: 60%; ">
            <h5 class="font-weight-bold">Facundo Bove Hernandez</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
        </div>
    
        <div class="col-md-3 mb-4">
            <img src="https://via.placeholder.com/150" alt="Integrante 2" class="img-fluid rounded-circle mb-3" style="width: 60%; ">
            <h5 class="font-weight-bold">Juan Garrone</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
        </div>
    
        <div class="col-md-3 mb-4">
            <img src="https://via.placeholder.com/150" alt="Integrante 3" class="img-fluid rounded-circle mb-3" style="width: 60%; ">
            <h5 class="font-weight-bold">Matias Tort</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
        </div>
    
        <div class="col-md-3 mb-4">
            <img src="https://via.placeholder.com/150" alt="Integrante 4" class="img-fluid rounded-circle mb-3" style="width: 60%; ">
            <h5 class="font-weight-bold">Fabrizio Lombardo</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="font-weight-bold text-center mb-4">Contactanos</h2>
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Tu correo electrónico" required>
                </div>
                <div class="form-group">
                    <label for="message">Mensaje</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-light btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>

@include('footer')

<!-- Estilos específicos -->
<style>
    /* Colores de la gama pastel para fondo, texto y botones */
    body {
        background-color: #f8f9fa; /* Fondo claro */
        font-family: 'Arial', sans-serif;
    }

    .text-pastel {
        color: #a2cadf; /* Color pastel para los títulos */
    }

    .btn-outline-light {
        background-color: #a2cadf; /* Botón en un tono pastel rosa */
        color: white;
        border: none;
        border-radius: 0.25rem;
    }

    .btn-outline-light:hover {
        background-color: #ffcbdb; /* Color ligeramente más oscuro para el hover */
    }

    .navbar .nav-link {
        color: #ffffff !important; /* Blanco puro */
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3); /* Sombra sutil para resaltar */
    }

    .bg-pastel {
        background-color: #a2cadf; /* Tonalidad pastel melón */
        color: #e46363; /* Texto oscuro para contraste */
    }

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
        background-color: #eb9ac0;
        color: white;
        border: none;
    }
    .search-form button:hover {
        background-color: #ffcbdb;
        transition: background-color 0.3s ease;
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

    /* Ajuste de las imágenes en círculos y botones */
    .col-md-3 .img-fluid {
        border-radius: 50%;
        border: 5px solid #f9f6f0;
    }

    /* Ajuste de las imágenes en las filas */
    .row.align-items-center img {
        max-width: 100%;
        margin-left: 0;
    }
</style>






