@include('header-user')

<main class="container mt-5 flex-grow-1">
    <h1>Productos en {{ $categoria->nombre_categoria }}</h1>

    @if($productos->isEmpty())
        <p>No hay productos disponibles en esta categoría.</p>
    @else
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $producto->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $producto->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre_producto }}</h5> <!-- Ver h5 -->
                            <p class="card-text">{{ $producto->descripcion_producto }}</p>
                            <a href="{{ route('producto.show', $producto->id_producto) }}" class="btn btn-pastel">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add link para pasar a la siguiente página -->
    @endif
</main>

<style>
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
</style>

@include('footer')
