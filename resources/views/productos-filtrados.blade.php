@include('header-user')

<div class="container mt-5">
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
                            <h5 class="card-title">{{ $producto->name }}</h5> <!-- Ver h5 -->
                            <p class="card-text">{{ $producto->description }}</p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add link para pasar a la siguiente página -->
    @endif
</div>

@include('footer')
