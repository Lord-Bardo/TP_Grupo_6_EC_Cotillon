@include('header-user')

<div class="container mt-4">

    <div class="swiper mb-5">

      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="{{ asset('images/promo-cotillon.png') }}" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('images/promo-cotillon.png') }}" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('images/promo-cotillon.png') }}" alt=""></div>
      </div>
    
      <div class="swiper-pagination"></div>
    
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    
      <div class="swiper-scrollbar"></div>
    </div>
    
    <div class="row mt-5">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/250x150" class="card-img-top" alt="{{ $producto->nombre_producto }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                        <p class="card-text">{{ $producto->descripcion_producto }}</p>
                        <a href="{{ route('producto.show', $producto->id_producto) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">

                @if ($productos->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Anterior</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $productos->previousPageUrl() }}" class="page-link">Anterior</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $productos->lastPage(); $i++)
                    <li class="page-item {{ $i == $productos->currentPage() ? 'active' : '' }}">
                        <a href="{{ $productos->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor

                @if ($productos->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $productos->nextPageUrl() }}" class="page-link">Siguiente</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Siguiente</span>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</div>

<!-- Estilos específicos -->
<style>
    /* Contenedor principal del slider */
    /* Fondo del body con gradiente */
    body {
        margin: 0; /* Elimina el margen por defecto */
        padding: 0;
        background: linear-gradient(to bottom, #a2cadf, #ffffff 70%);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .swiper {
        width: 100%;
        max-width: 900px; /* Ajusta el ancho máximo del slider */
        height: 400px; /* Altura fija para el slider */
        margin: 0 auto; /* Centrar horizontalmente */
        position: relative; /* Para posicionar los controles */
        background-color: #f8f9fa; /* Fondo claro como fallback */
    }

    /* Estilo de las imágenes dentro del slider */
    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 2%;
        border: 2px solid #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Controles de las flechas */
    .swiper-button-prev,
    .swiper-button-next {
        color: #ffffff; /* Blanco para las flechas */
        border-radius: 50%; /* Forma circular */
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute; /* Se posicionan relativas al contenedor */
        top: 50%;
        transform: translateY(-50%); /* Centrar verticalmente */
        z-index: 10;
    }

    /* Posición específica de cada flecha */
    .swiper-button-prev {
        left: 10px; /* Ajusta la separación del borde izquierdo */
    }
    .swiper-button-next {
        right: 10px; /* Ajusta la separación del borde derecho */
    }

    /* Scrollbar del slider */
    .swiper-scrollbar {
        background-color: #ddd; /* Color de fondo del scrollbar */
        height: 5px; /* Altura del scrollbar */
        border-radius: 5px;
    }
</style>

@include('footer')
