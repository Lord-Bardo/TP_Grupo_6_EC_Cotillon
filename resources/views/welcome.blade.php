@include('header-user')

<div class="container mt-4">
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/250x150" class="card-img-top" alt="{{ $producto->nombre_producto }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                        <p class="card-text">{{ $producto->descripcion_producto }}</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
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

@include('footer')