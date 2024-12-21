@include('header-user')

<div class="container my-5">
    
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/oso.png') }}" alt="Mission Image" 
                 class="img-fluid rounded-circle shadow animated-oso" 
                 id="oso">
        </div>
        <div class="col-md-6 text-center text-md-left">
            <h2 class="font-weight-bold">Nuestra Misión</h2>
            <p class="lead text-muted">Crear oportunidades económicas que impulsen el potencial colectivo del país, brindando una plataforma eficiente y accesible para conectar vendedores y compradores.</p>
        </div>
    </div>

    
    <div class="row align-items-center mb-5">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('images/pingu.png') }}" alt="Founding Story Image" class="img-fluid rounded-circle shadow">
        </div>
        <div class="col-md-6 order-md-1 text-center text-md-left">
            <h2 class="font-weight-bold">Nuestra Historia</h2>
            <p class="lead text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam, illum, perferendis, quis fuga unde vero neque rerum cumque totam quaerat voluptas facilis? Accusantium excepturi quas molestias velit numquam, ea impedit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi explicabo sit numquam, quod, culpa esse distinctio dolore quaerat ducimus quisquam quia officiis voluptas. Quos libero quidem, officiis rerum consequuntur nemo? Lore</p>
        </div>
    </div>

    <hr style="border: 0; border-top: 1px solid #a09f9f; margin: 30px 0;">

    
    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Nuestro Equipo</h2>
    </div>
    
    <div class="row text-center">

        <div class="col-md-3 mb-4">
            <img src="{{ asset('images/the-goat.png') }}" alt="Integrante 1" class="img-fluid rounded-circle mb-3" style="width: 60%;">
            <h5 class="font-weight-bold">Facundo Bove Hernandez</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
            <img src="{{ asset('images/goat.png') }}" alt="goat" class="img-fluid mb-3" style="width: 40px;">
        </div>
    
        <div class="col-md-3 mb-4">
            <img src="https://via.placeholder.com/150" alt="Integrante 2" class="img-fluid rounded-circle mb-3" style="width: 60%;">
            <h5 class="font-weight-bold">Juan Garrone</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
        </div>
    
        <div class="col-md-3 mb-4">
            <img src="https://via.placeholder.com/150" alt="Integrante 3" class="img-fluid rounded-circle mb-3" style="width: 60%;">
            <h5 class="font-weight-bold">Matias Tort</h5>
            <p class="text-muted">Estudiante de Ingenieria en Sistemas</p>
        </div>
    
        <div class="col-md-3 mb-4">
            <img src="https://via.placeholder.com/150" alt="Integrante 4" class="img-fluid rounded-circle mb-3" style="width: 60%;">
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
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>

@include('footer-us')

