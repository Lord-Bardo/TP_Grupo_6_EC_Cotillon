@include('header-user')

<main id="id-main">
    <div class="container mt-4">

        <div class="swiper mb-5">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="swiper-zoom-container">
                        <img src="{{ asset('images/promo-cotillon.png') }}" alt="Promoción Cotillón">
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="{{ asset('images/carrousel2.png') }}" alt="Promoción Cotillón">
                </div>
            
                <div class="swiper-slide">
                    <div class="swiper-zoom-container">
                        <img src="{{ asset('images/carrousel-navidad.png') }}" alt="Promoción Cotillón">
                    </div>
                </div>
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
                            <a href="{{ route('producto.show', $producto->id_producto) }}" class="btn btn-pastel">Ver más</a>
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
                        <li class="page-item {{ $i == $productos->currentPage() ? 'active pastel-page' : '' }}">
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
</main>

<style>
    #id-main {
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #a2cadf, #ffffff 80%);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Estilo pastel para el botón 'Ver más' */
    .btn-pastel {
        background-color: #eb9ac0; /* Azul pastel */
        color: white;
        border: none;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .btn-pastel:hover {
        background-color: #eb9ac0; /* Azul pastel más oscuro */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-pastel:active {
        background-color: #eb9ac0;
        transform: scale(0.98);
    }
    
    .pagination .page-item.active .page-link {
        background-color: #9cd2eb;
        border-color: #a9dcf3;
        color: white;
    }

    .pagination .page-item.active .page-link:hover {
        background-color: #81d4fa;
        border-color: #81d4fa;
    }

    .pagination .page-link {
        color: black; /* Default text color */
        font-size: 1rem;
    }

    .pagination .page-item:hover .page-link {
        background-color: #f5f5f5; /* Light gray background on hover */
        color: black;
    }
    
</style>

@include('footer')
