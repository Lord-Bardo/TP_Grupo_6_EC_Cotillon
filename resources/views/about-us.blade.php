@include('header-user')

<div class="container my-5">
    
    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center">
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
        <div class="col-md-6 order-md-2 text-center">
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
                <button type="submit" class="btn btn-pastel btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>

@include('footer')

<!-- Estilos específicos -->
<style>
    body {
        background-color: #f8f9fa; 
    }
    
    .btn-pastel {
        background-color: transparent; /* Sin fondo inicial */
        color: #000000; /* Color de texto pastel */
        font-size: 1.2rem; /* Tamaño del texto */
        padding: 0.75rem 1.5rem; /* Espaciado interno */
        border: none; /* Sin bordes */
        border-radius: 2px; /* Bordes redondeados */
        cursor: pointer; /* Mano al pasar el cursor */
        transition: background-color 0.3s ease, color 0.3s ease; /* Transición suave */
    }

    /* Estilo al pasar el cursor (hover) */
    .btn-pastel:hover {
        background-color: #ffb6c1; /* Color pastel suave */
        color: white; /* Texto blanco */
    }

    /* Centrar el botón */
    .form-group + .btn-pastel {
        display: block; /* Lo convertimos en bloque */
        margin: 2rem auto 0; /* Margen arriba y centrado */
        width: fit-content; /* Tamaño ajustado al contenido */
    }
</style>






