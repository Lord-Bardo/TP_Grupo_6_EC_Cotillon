@include('header-user')

<main class="container mt-5 flex-grow-1">

    @if($productos->isEmpty())
        <div class="no-products-message">
            <div class="message-content">
                <p>Lo sentimos, pero no tenemos productos disponibles en este momento.</p>
                <a href="{{ route('welcome') }}" class="btn btn-pastel">Volver al inicio</a>
            </div>
        </div>
    @else
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($producto->url_producto) }}" class="card-img-top object-fit-contain" alt="{{ $producto->nombre_producto }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                            <p class="card-text">{{ $producto->descripcion_producto }}</p>
                            <a href="{{ route('producto.show', $producto->id_producto) }}" class="btn btn-pastel">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

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
    @endif

</main>

<style>
    .no-products-message {
        text-align: center;
        padding: 50px;
        border-radius: 10px;
        margin-top: 30px;
    }

    .no-products-message p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .no-products-message .btn-pastel {
        font-size: 1.2rem;
        padding: 12px 30px;
        background-color: #a2cadf;
        color: white;
        text-transform: uppercase;
        border-radius: 30px;
        border: none;
        transition: all 0.3s ease;
    }

    .no-products-message .btn-pastel:hover {
        background-color: #eec8d1;
    }

    .no-products-message .btn-pastel:active {
        transform: scale(0.98);
    }

    .btn-pastel {
        background-color: #eb9ac0;
        color: white;
        border: none;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .btn-pastel:hover {
        background-color: #eb9ac0;
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